<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use Composer\Pcre\Preg;
use PHPCoord\Exception\UnknownConversionException;
use PHPCoord\Point\GeographicPoint;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Length\Millimetre;

use function array_key_first;
use function assert;
use function chr;
use function count;
use function gzinflate;
use function gzuncompress;
use function intdiv;
use function is_nan;
use function max;
use function min;
use function ord;
use function pack;
use function rtrim;
use function strlen;
use function str_repeat;
use function substr;
use function usort;

/**
 * GeoTIFF grid (GTG): TIFF 6 + GeoTIFF 1.1, as used by PROJ.
 *
 * @see https://proj.org/en/latest/specifications/geodetictiffgrids.html
 */
class GeoTiffGrid extends GeographicGrid
{
    use BilinearInterpolation;

    private const COMPRESSION_NONE = 1;
    private const COMPRESSION_LZW = 5;
    private const COMPRESSION_DEFLATE = 8;
    private const PLANAR_CONTIG = 1;
    private const PLANAR_SEPARATE = 2;
    private const SAMPLEFORMAT_UINT = 1;
    private const SAMPLEFORMAT_INT = 2;
    private const SAMPLEFORMAT_IEEEFP = 3;
    private const TYPE_SHORT = 3;
    private const TYPE_LONG = 4;
    private const TYPE_RATIONAL = 5;
    private const TYPE_DOUBLE = 12;
    private const RASTER_PIXEL_IS_AREA = 1;
    private const BLOCK_CACHE_LIMIT = 16;

    private string $u16;
    private string $u32;
    private string $floatChar;
    private string $doubleChar;
    private bool $littleEndian;

    /**
     * One entry per TIFF Image File Directory (the tag list describing one image).
     * Extra directories are nested subgrids, same idea as NTv2.
     *
     * @var list<array{
     *     width: int,
     *     height: int,
     *     samplesPerPixel: int,
     *     bytesPerSample: int,
     *     sampleFormat: int,
     *     compression: int,
     *     predictor: int,
     *     planarConfiguration: int,
     *     tiled: bool,
     *     blockWidth: int,
     *     blockHeight: int,
     *     blocksPerRow: int,
     *     blocksPerCol: int,
     *     offsets: list<int>,
     *     byteCounts: list<int>,
     *     west: float,
     *     east: float,
     *     south: float,
     *     north: float,
     *     resX: float,
     *     resY: float,
     *     bottomUp: bool,
     *     type: string,
     *     unitTypes: array<int, string>,
     *     scale: array<int, float>,
     *     offset: array<int, float>,
     *     nodata: ?float
     * }>
     */
    private array $directories = [];

    /**
     * @var array<string, string>
     */
    private array $blockCache = [];

    /**
     * @var array{
     *     width: int,
     *     height: int,
     *     samplesPerPixel: int,
     *     bytesPerSample: int,
     *     sampleFormat: int,
     *     compression: int,
     *     predictor: int,
     *     planarConfiguration: int,
     *     tiled: bool,
     *     blockWidth: int,
     *     blockHeight: int,
     *     blocksPerRow: int,
     *     blocksPerCol: int,
     *     offsets: list<int>,
     *     byteCounts: list<int>,
     *     west: float,
     *     east: float,
     *     south: float,
     *     north: float,
     *     resX: float,
     *     resY: float,
     *     bottomUp: bool,
     *     type: string,
     *     unitTypes: array<int, string>,
     *     scale: array<int, float>,
     *     offset: array<int, float>,
     *     nodata: ?float
     * }|null
     */
    private ?array $activeDirectory = null;

    public function __construct(string $filename)
    {
        $this->gridFile = new GridFile($filename);
        $this->storageOrder = self::STORAGE_ORDER_INCREASING_LATITUDE_INCREASING_LONGITUDE;
        $this->readHeader();
    }

    /**
     * @return array<Angle|Length>
     */
    public function getValues(float $x, float $y): array
    {
        // Some grids (GTX-converted, NOAA) store longitude in 0–360 rather than −180–180.
        if ($x < $this->unionWest()) {
            $x += 360;
        }

        $directory = $this->selectDirectory($x, $y);
        $this->bindDirectory($directory);
        $values = $this->interpolate($x, $y);

        $wrapped = [];
        foreach ($values as $i => $value) {
            $wrapped[] = $this->wrapSample($value, $i);
        }

        return $wrapped;
    }

    public function getHeightAdjustment(GeographicPoint $location): Length
    {
        /** @var array{0: Length} $samples */
        $samples = $this->getValues($location->getLongitude()->asDegrees()->getValue(), $location->getLatitude()->asDegrees()->getValue());

        return $samples[0];
    }

    /**
     * Bounding box covering every subgrid, in the file's georeferenced units (usually degrees).
     *
     * @return array{west: float, east: float, south: float, north: float}
     */
    public function getGeographicExtent(): array
    {
        return [
            'west' => $this->unionWest(),
            'east' => $this->unionEast(),
            'south' => $this->unionSouth(),
            'north' => $this->unionNorth(),
        ];
    }

    protected function getRecord(int $longitudeIndex, int $latitudeIndex): GridValues
    {
        assert($this->activeDirectory !== null);
        $directory = $this->activeDirectory;
        // BilinearInterpolation indexes from the south; GeoTIFF row 0 is north unless PixelScale Y is negative.
        $tiffRow = $directory['bottomUp'] ? $latitudeIndex : $directory['height'] - 1 - $latitudeIndex;

        $samples = [];
        for ($sample = 0; $sample < $directory['samplesPerPixel']; ++$sample) {
            $samples[] = $this->readSample($directory, $longitudeIndex, $tiffRow, $sample);
        }

        return new GridValues(
            $longitudeIndex * $this->columnGridInterval + $this->startX,
            $latitudeIndex * $this->rowGridInterval + $this->startY,
            $samples
        );
    }

    private function readHeader(): void
    {
        $this->gridFile->fseek(0);
        $byteOrder = $this->gridFile->fread(2);
        if ($byteOrder === 'II') {
            $this->littleEndian = true;
            $this->u16 = 'v';
            $this->u32 = 'V';
            $this->floatChar = 'g';
            $this->doubleChar = 'e';
        } elseif ($byteOrder === 'MM') {
            $this->littleEndian = false;
            $this->u16 = 'n';
            $this->u32 = 'N';
            $this->floatChar = 'G';
            $this->doubleChar = 'E';
        } else {
            throw new UnknownConversionException('Not a TIFF file: ' . $this->gridFile->getFilename());
        }

        $magic = $this->unpackU16($this->gridFile->fread(2));
        if ($magic === 43) { // BigTIFF
            throw new UnknownConversionException('BigTIFF is not supported: ' . $this->gridFile->getFilename());
        }
        if ($magic !== 42) {
            throw new UnknownConversionException('Not a classic TIFF file: ' . $this->gridFile->getFilename());
        }

        $ifdOffset = $this->unpackU32($this->gridFile->fread(4)); // byte offset of the first image directory
        $seen = [];
        // Classic TIFF: image directories are a linked list (offset 0 ends it).
        while ($ifdOffset !== 0) {
            if (isset($seen[$ifdOffset])) {
                throw new UnknownConversionException('TIFF image-directory loop: ' . $this->gridFile->getFilename());
            }
            $seen[$ifdOffset] = true;
            $nextIfdOffset = 0;
            $directory = $this->readDirectory($ifdOffset, $nextIfdOffset);
            if ($directory) {
                $this->directories[] = $directory;
            }
            $ifdOffset = $nextIfdOffset;
        }

        if ($this->directories === []) {
            throw new UnknownConversionException('No usable GeoTIFF image directory: ' . $this->gridFile->getFilename());
        }
    }

    /**
     * @return array{
     *     width: int,
     *     height: int,
     *     samplesPerPixel: int,
     *     bytesPerSample: int,
     *     sampleFormat: int,
     *     compression: int,
     *     predictor: int,
     *     planarConfiguration: int,
     *     tiled: bool,
     *     blockWidth: int,
     *     blockHeight: int,
     *     blocksPerRow: int,
     *     blocksPerCol: int,
     *     offsets: list<int>,
     *     byteCounts: list<int>,
     *     west: float,
     *     east: float,
     *     south: float,
     *     north: float,
     *     resX: float,
     *     resY: float,
     *     bottomUp: bool,
     *     type: string,
     *     unitTypes: array<int, string>,
     *     scale: array<int, float>,
     *     offset: array<int, float>,
     *     nodata: ?float
     * }|null
     */
    private function readDirectory(int $ifdOffset, int &$nextIfdOffset): ?array
    {
        $this->gridFile->fseek($ifdOffset);
        $entryCount = $this->unpackU16($this->gridFile->fread(2));
        $entries = [];
        for ($i = 0; $i < $entryCount; ++$i) {
            $raw = $this->gridFile->fread(12); // tag, type, count, value-or-offset
            $tag = $this->unpackU16(substr($raw, 0, 2));
            $type = $this->unpackU16(substr($raw, 2, 2));
            $count = $this->unpackU32(substr($raw, 4, 4));
            $entries[$tag] = ['type' => $type, 'count' => $count, 'value' => substr($raw, 8, 4)];
        }
        $nextIfdOffset = $this->unpackU32($this->gridFile->fread(4));

        $compression = isset($entries[259]) ? $this->tagUInt($entries[259]) : self::COMPRESSION_NONE;
        $photometric = isset($entries[262]) ? $this->tagUInt($entries[262]) : 1;
        if ($photometric === 6 || isset($entries[34264])) { // YCbCr, ModelTransformationTag
            return null;
        }
        if ($compression !== self::COMPRESSION_NONE && $compression !== self::COMPRESSION_LZW && $compression !== self::COMPRESSION_DEFLATE) {
            return null;
        }

        $width = $this->tagUInt($entries[256]);
        $height = $this->tagUInt($entries[257]);
        $samplesPerPixel = isset($entries[277]) ? $this->tagUInt($entries[277]) : 1;
        $bitsPerSample = isset($entries[258]) ? $this->tagUInts($entries[258])[0] : 1;
        $sampleFormat = isset($entries[339]) ? $this->tagUInts($entries[339])[0] : self::SAMPLEFORMAT_UINT;
        $predictor = isset($entries[317]) ? $this->tagUInt($entries[317]) : 1;
        $planarConfiguration = isset($entries[284]) ? $this->tagUInt($entries[284]) : self::PLANAR_CONTIG;

        if ($bitsPerSample % 8 !== 0) {
            return null;
        }
        if ($sampleFormat !== self::SAMPLEFORMAT_UINT && $sampleFormat !== self::SAMPLEFORMAT_INT && $sampleFormat !== self::SAMPLEFORMAT_IEEEFP) {
            return null;
        }
        if ($predictor !== 1 && $predictor !== 2 && $predictor !== 3) {
            return null;
        }
        if ($planarConfiguration !== self::PLANAR_CONTIG && $planarConfiguration !== self::PLANAR_SEPARATE) {
            return null;
        }

        $tiled = isset($entries[322]);
        if ($tiled) {
            $blockWidth = $this->tagUInt($entries[322]);
            $blockHeight = $this->tagUInt($entries[323]);
            $offsets = $this->tagUInts($entries[324]);
            $byteCounts = $this->tagUInts($entries[325]);
        } else {
            $blockWidth = $width;
            $blockHeight = isset($entries[278]) ? $this->tagUInt($entries[278]) : $height;
            $blockHeight = min($blockHeight, $height);
            $offsets = $this->tagUInts($entries[273]);
            $byteCounts = $this->tagUInts($entries[279]);
        }

        if (!isset($entries[33550], $entries[33922])) { // ModelPixelScale, ModelTiepoint
            return null;
        }
        $pixelScale = $this->tagDoubles($entries[33550]);
        $tiepoint = $this->tagDoubles($entries[33922]);
        if (count($pixelScale) < 2 || count($tiepoint) < 5) {
            return null;
        }

        $rasterType = 2; // GeoTIFF GTRasterTypeGeoKey: 1 = PixelIsArea, 2 = PixelIsPoint (GTG default)
        if (isset($entries[34735])) {
            $geoKeys = $this->tagUInts($entries[34735]);
            for ($i = 4; $i + 3 < count($geoKeys); $i += 4) {
                if ($geoKeys[$i] === 1025) {
                    $rasterType = $geoKeys[$i + 3];
                }
            }
        }

        // ModelTiepoint + ModelPixelScale. PixelIsArea origin is the pixel corner; we store node centres.
        $hRes = $pixelScale[0];
        $vRes = $pixelScale[1];
        $west = $tiepoint[3] - $tiepoint[0] * $hRes;
        $north = $tiepoint[4] + $tiepoint[1] * $vRes;
        if ($rasterType === self::RASTER_PIXEL_IS_AREA) {
            $west += 0.5 * $hRes;
            $north -= 0.5 * $vRes;
        }
        $east = $west + $hRes * ($width - 1);
        $south = $north - $vRes * ($height - 1);
        $bottomUp = $vRes < 0; // negative PixelScale Y means TIFF row 0 is already south
        if ($bottomUp) {
            $tmp = $north;
            $north = $south;
            $south = $tmp;
        }

        $metadata = ['type' => '', 'unitTypes' => [], 'scale' => [], 'offset' => []];
        if (isset($entries[42112])) { // GDAL_METADATA: TYPE, UNITTYPE, SCALE/OFFSET
            $metadata = $this->parseGdalMetadata($this->tagAscii($entries[42112]), $samplesPerPixel);
        }
        $nodata = null;
        if (isset($entries[42113])) { // GDAL_NODATA (raw value, before scale/offset)
            $nodata = (float) $this->tagAscii($entries[42113]);
        }

        $blocksPerRow = intdiv($width + $blockWidth - 1, $blockWidth);
        $blocksPerCol = intdiv($height + $blockHeight - 1, $blockHeight);

        return [
            'width' => $width,
            'height' => $height,
            'samplesPerPixel' => $samplesPerPixel,
            'bytesPerSample' => intdiv($bitsPerSample, 8),
            'sampleFormat' => $sampleFormat,
            'compression' => $compression,
            'predictor' => $predictor,
            'planarConfiguration' => $planarConfiguration,
            'tiled' => $tiled,
            'blockWidth' => $blockWidth,
            'blockHeight' => $blockHeight,
            'blocksPerRow' => $blocksPerRow,
            'blocksPerCol' => $blocksPerCol,
            'offsets' => $offsets,
            'byteCounts' => $byteCounts,
            'west' => $west,
            'east' => $east,
            'south' => $south,
            'north' => $north,
            'resX' => $hRes < 0 ? -$hRes : $hRes,
            'resY' => $vRes < 0 ? -$vRes : $vRes,
            'bottomUp' => $bottomUp,
            'type' => $metadata['type'],
            'unitTypes' => $metadata['unitTypes'],
            'scale' => $metadata['scale'],
            'offset' => $metadata['offset'],
            'nodata' => $nodata,
        ];
    }

    /**
     * @param array{type: int, count: int, value: string} $entry
     */
    private function tagUInt(array $entry): int
    {
        return $this->tagUInts($entry)[0];
    }

    /**
     * @param  array{type: int, count: int, value: string} $entry
     * @return list<int>
     */
    private function tagUInts(array $entry): array
    {
        $data = $this->tagData($entry);
        $values = [];
        if ($entry['type'] === self::TYPE_SHORT) {
            for ($i = 0; $i < $entry['count']; ++$i) {
                $values[] = $this->unpackU16(substr($data, $i * 2, 2));
            }
        } else {
            for ($i = 0; $i < $entry['count']; ++$i) {
                $values[] = $this->unpackU32(substr($data, $i * 4, 4));
            }
        }

        return $values;
    }

    /**
     * @param  array{type: int, count: int, value: string} $entry
     * @return list<float>
     */
    private function tagDoubles(array $entry): array
    {
        $data = $this->tagData($entry);
        $values = [];
        for ($i = 0; $i < $entry['count']; ++$i) {
            $values[] = (float) $this->unpack($this->doubleChar, $data, $i * 8)[1];
        }

        return $values;
    }

    /**
     * @param array{type: int, count: int, value: string} $entry
     */
    private function tagAscii(array $entry): string
    {
        return rtrim($this->tagData($entry), "\0");
    }

    /**
     * @param array{type: int, count: int, value: string} $entry
     */
    private function tagData(array $entry): string
    {
        $size = $this->typeSize($entry['type']) * $entry['count'];
        if ($size <= 4) { // fits in the directory entry; otherwise the 4 bytes are a file offset
            return $entry['value'];
        }
        $offset = $this->unpackU32($entry['value']);
        $this->gridFile->fseek($offset);

        return $this->gridFile->fread($size);
    }

    private function typeSize(int $type): int
    {
        return match ($type) {
            1, 2, 6, 7 => 1,
            self::TYPE_SHORT, 8 => 2,
            self::TYPE_LONG, 9, 11 => 4,
            self::TYPE_RATIONAL, 10, self::TYPE_DOUBLE => 8,
            default => 1,
        };
    }

    /**
     * @return array{type: string, unitTypes: array<int, string>, scale: array<int, float>, offset: array<int, float>}
     */
    private function parseGdalMetadata(string $xml, int $samplesPerPixel): array
    {
        $type = '';
        $unitTypes = [];
        $scale = [];
        $offset = [];
        if (Preg::matchAll('/<Item\b([^>]*)>([^<]*)<\/Item>/', $xml, $matches)) {
            foreach ($matches[1] as $i => $attrs) {
                $attrs = (string) $attrs;
                $name = Preg::match('/name="([^"]*)"/', $attrs, $m) ? (string) $m[1] : '';
                $sample = Preg::match('/sample="(\d+)"/', $attrs, $m) ? (int) $m[1] : -1;
                $role = Preg::match('/role="([^"]*)"/', $attrs, $m) ? (string) $m[1] : '';
                $value = (string) $matches[2][$i];
                if ($name === 'TYPE') {
                    $type = $value;
                } elseif ($name === 'UNITTYPE' || $role === 'unittype') {
                    if ($sample >= 0) {
                        $unitTypes[$sample] = $value;
                    }
                } elseif ($role === 'scale' && $sample >= 0 && $sample < $samplesPerPixel) {
                    $scale[$sample] = (float) $value;
                } elseif ($role === 'offset' && $sample >= 0 && $sample < $samplesPerPixel) {
                    $offset[$sample] = (float) $value;
                }
            }
        }

        return ['type' => $type, 'unitTypes' => $unitTypes, 'scale' => $scale, 'offset' => $offset];
    }

    /**
     * @return array{
     *     width: int,
     *     height: int,
     *     samplesPerPixel: int,
     *     bytesPerSample: int,
     *     sampleFormat: int,
     *     compression: int,
     *     predictor: int,
     *     planarConfiguration: int,
     *     tiled: bool,
     *     blockWidth: int,
     *     blockHeight: int,
     *     blocksPerRow: int,
     *     blocksPerCol: int,
     *     offsets: list<int>,
     *     byteCounts: list<int>,
     *     west: float,
     *     east: float,
     *     south: float,
     *     north: float,
     *     resX: float,
     *     resY: float,
     *     bottomUp: bool,
     *     type: string,
     *     unitTypes: array<int, string>,
     *     scale: array<int, float>,
     *     offset: array<int, float>,
     *     nodata: ?float
     * }
     */
    private function selectDirectory(float $x, float $y): array
    {
        // PROJ rule: of the subgrids containing the point, use the smallest cell (highest resolution).
        $candidates = [];
        foreach ($this->directories as $index => $directory) {
            if ($x + 1e-12 >= $directory['west'] && $x - 1e-12 <= $directory['east'] && $y + 1e-12 >= $directory['south'] && $y - 1e-12 <= $directory['north']) {
                $candidates[] = [$directory['resX'] * $directory['resY'], $index];
            }
        }
        if ($candidates === []) {
            throw new UnknownConversionException('Coordinate is outside the grid');
        }
        usort($candidates, static fn (array $a, array $b): int => $a[0] <=> $b[0]);

        return $this->directories[$candidates[0][1]];
    }

    /**
     * @param array{
     *     width: int,
     *     height: int,
     *     samplesPerPixel: int,
     *     bytesPerSample: int,
     *     sampleFormat: int,
     *     compression: int,
     *     predictor: int,
     *     planarConfiguration: int,
     *     tiled: bool,
     *     blockWidth: int,
     *     blockHeight: int,
     *     blocksPerRow: int,
     *     blocksPerCol: int,
     *     offsets: list<int>,
     *     byteCounts: list<int>,
     *     west: float,
     *     east: float,
     *     south: float,
     *     north: float,
     *     resX: float,
     *     resY: float,
     *     bottomUp: bool,
     *     type: string,
     *     unitTypes: array<int, string>,
     *     scale: array<int, float>,
     *     offset: array<int, float>,
     *     nodata: ?float
     * } $directory
     */
    private function bindDirectory(array $directory): void
    {
        // BilinearInterpolation origin is south-west, axes increasing east and north.
        $this->activeDirectory = $directory;
        $this->startX = $directory['west'];
        $this->endX = $directory['east'];
        $this->startY = $directory['south'];
        $this->endY = $directory['north'];
        $this->columnGridInterval = $directory['resX'];
        $this->rowGridInterval = $directory['resY'];
        $this->numberOfColumns = $directory['width'];
        $this->numberOfRows = $directory['height'];
    }

    /**
     * @param array{
     *     width: int,
     *     height: int,
     *     samplesPerPixel: int,
     *     bytesPerSample: int,
     *     sampleFormat: int,
     *     compression: int,
     *     predictor: int,
     *     planarConfiguration: int,
     *     tiled: bool,
     *     blockWidth: int,
     *     blockHeight: int,
     *     blocksPerRow: int,
     *     blocksPerCol: int,
     *     offsets: list<int>,
     *     byteCounts: list<int>,
     *     west: float,
     *     east: float,
     *     south: float,
     *     north: float,
     *     resX: float,
     *     resY: float,
     *     bottomUp: bool,
     *     type: string,
     *     unitTypes: array<int, string>,
     *     scale: array<int, float>,
     *     offset: array<int, float>,
     *     nodata: ?float
     * } $directory
     */
    private function readSample(array $directory, int $col, int $row, int $sample): float
    {
        $blockX = intdiv($col, $directory['blockWidth']);
        $blockY = intdiv($row, $directory['blockHeight']);
        $colInBlock = $col - $blockX * $directory['blockWidth'];
        $rowInBlock = $row - $blockY * $directory['blockHeight'];
        $blockId = $blockY * $directory['blocksPerRow'] + $blockX;
        if ($directory['planarConfiguration'] === self::PLANAR_SEPARATE) {
            // Each sample has its own strip/tile sequence after the previous sample's blocks.
            $blockId += $sample * $directory['blocksPerRow'] * $directory['blocksPerCol'];
        }

        $block = $this->readBlock($directory, $blockId);
        $samplesPerPixel = $directory['planarConfiguration'] === self::PLANAR_CONTIG ? $directory['samplesPerPixel'] : 1;
        $sampleInPixel = $directory['planarConfiguration'] === self::PLANAR_CONTIG ? $sample : 0;
        $index = ($rowInBlock * $directory['blockWidth'] + $colInBlock) * $samplesPerPixel + $sampleInPixel;
        $raw = $this->unpackSample($directory, $block, $index);

        if ($directory['nodata'] !== null && $raw === $directory['nodata']) {
            throw new UnknownConversionException('Coordinate is outside the grid');
        }
        if (is_nan($raw)) {
            throw new UnknownConversionException('Coordinate is outside the grid');
        }

        $scale = $directory['scale'][$sample] ?? 1.0;
        $offset = $directory['offset'][$sample] ?? 0.0;

        return $raw * $scale + $offset; // integer grids: decoded = offset + scale * raw
    }

    /**
     * @param array{
     *     width: int,
     *     height: int,
     *     samplesPerPixel: int,
     *     bytesPerSample: int,
     *     sampleFormat: int,
     *     compression: int,
     *     predictor: int,
     *     planarConfiguration: int,
     *     tiled: bool,
     *     blockWidth: int,
     *     blockHeight: int,
     *     blocksPerRow: int,
     *     blocksPerCol: int,
     *     offsets: list<int>,
     *     byteCounts: list<int>,
     *     west: float,
     *     east: float,
     *     south: float,
     *     north: float,
     *     resX: float,
     *     resY: float,
     *     bottomUp: bool,
     *     type: string,
     *     unitTypes: array<int, string>,
     *     scale: array<int, float>,
     *     offset: array<int, float>,
     *     nodata: ?float
     * } $directory
     */
    private function readBlock(array $directory, int $blockId): string
    {
        $cacheKey = $directory['west'] . ':' . $directory['north'] . ':' . $blockId;
        if (isset($this->blockCache[$cacheKey])) {
            return $this->blockCache[$cacheKey];
        }

        if (!isset($directory['offsets'][$blockId], $directory['byteCounts'][$blockId])) {
            throw new UnknownConversionException('GeoTIFF block is missing');
        }
        $this->gridFile->fseek($directory['offsets'][$blockId]);
        $compressed = $this->gridFile->fread($directory['byteCounts'][$blockId]);
        $decoded = $this->decompress($directory['compression'], $compressed);
        $decoded = $this->applyPredictor($directory, $decoded);

        if (count($this->blockCache) >= self::BLOCK_CACHE_LIMIT) {
            unset($this->blockCache[array_key_first($this->blockCache)]);
        }
        $this->blockCache[$cacheKey] = $decoded;

        return $decoded;
    }

    private function decompress(int $compression, string $data): string
    {
        if ($compression === self::COMPRESSION_NONE) {
            return $data;
        }
        if ($compression === self::COMPRESSION_DEFLATE) {
            $inflated = @gzuncompress($data); // Adobe-style zlib wrapper
            if ($inflated === false) {
                $inflated = @gzinflate($data); // raw deflate
            }
            if ($inflated === false) {
                throw new UnknownConversionException('Deflate decompression failed');
            }

            return $inflated;
        }
        if ($compression === self::COMPRESSION_LZW) {
            return $this->decompressLzw($data);
        }

        throw new UnknownConversionException('Unsupported TIFF compression');
    }

    /**
     * TIFF 6 §13 LZW (8-bit alphabet, EarlyChange).
     */
    private function decompressLzw(string $data): string
    {
        $nbits = 9;
        $nextCode = 258;
        $table = [];
        for ($i = 0; $i < 256; ++$i) {
            $table[$i] = chr($i);
        }
        $out = '';
        $bitPos = 0;
        $bitLength = strlen($data) * 8;
        $old = null;

        $getCode = static function () use (&$bitPos, $bitLength, $data, &$nbits): ?int {
            if ($bitPos + $nbits > $bitLength) {
                return null;
            }
            $code = 0;
            $got = 0;
            while ($got < $nbits) {
                $byte = ord($data[intdiv($bitPos, 8)]);
                $shift = 8 - ($bitPos % 8);
                $take = min($shift, $nbits - $got);
                $code = ($code << $take) | (($byte >> ($shift - $take)) & ((1 << $take) - 1));
                $bitPos += $take;
                $got += $take;
            }

            return $code;
        };

        while (($code = $getCode()) !== null) {
            if ($code === 257) {
                break;
            }
            if ($code === 256) {
                $table = [];
                for ($i = 0; $i < 256; ++$i) {
                    $table[$i] = chr($i);
                }
                $nbits = 9;
                $nextCode = 258;
                $old = $getCode();
                if ($old === 257) {
                    break;
                }
                $out .= $table[$old];
                continue;
            }
            if (isset($table[$code])) {
                $s = $table[$code];
            } elseif ($code === $nextCode && $old !== null) {
                $s = $table[$old] . $table[$old][0];
            } else {
                throw new UnknownConversionException('Corrupt LZW data in GeoTIFF');
            }
            $out .= $s;
            if ($old !== null && $nextCode < 4096) {
                $table[$nextCode] = $table[$old] . $s[0];
                ++$nextCode;
                if ($nextCode === (1 << $nbits) - 1 && $nbits < 12) { // TIFF EarlyChange
                    ++$nbits;
                }
            }
            $old = $code;
        }

        return $out;
    }

    /**
     * @param array{
     *     width: int,
     *     height: int,
     *     samplesPerPixel: int,
     *     bytesPerSample: int,
     *     sampleFormat: int,
     *     compression: int,
     *     predictor: int,
     *     planarConfiguration: int,
     *     tiled: bool,
     *     blockWidth: int,
     *     blockHeight: int,
     *     blocksPerRow: int,
     *     blocksPerCol: int,
     *     offsets: list<int>,
     *     byteCounts: list<int>,
     *     west: float,
     *     east: float,
     *     south: float,
     *     north: float,
     *     resX: float,
     *     resY: float,
     *     bottomUp: bool,
     *     type: string,
     *     unitTypes: array<int, string>,
     *     scale: array<int, float>,
     *     offset: array<int, float>,
     *     nodata: ?float
     * } $directory
     */
    private function applyPredictor(array $directory, string $decoded): string
    {
        if ($directory['predictor'] === 1) {
            return $decoded;
        }

        $channels = $directory['planarConfiguration'] === self::PLANAR_CONTIG ? $directory['samplesPerPixel'] : 1;
        $bytesPerSample = $directory['bytesPerSample'];
        $rowBytes = $directory['blockWidth'] * $channels * $bytesPerSample;
        if ($rowBytes === 0) {
            return $decoded;
        }
        $rows = intdiv(strlen($decoded), $rowBytes);
        $out = '';
        // Predictors run independently on each scanline of the strip/tile.
        for ($row = 0; $row < $rows; ++$row) {
            $scanline = substr($decoded, $row * $rowBytes, $rowBytes);
            if ($directory['predictor'] === 2) {
                $out .= $this->decodePredictor2($scanline, $directory['blockWidth'], $channels, $bytesPerSample);
            } else {
                $out .= $this->decodePredictor3($scanline, $directory['blockWidth'], $channels, $bytesPerSample);
            }
        }
        if (strlen($decoded) > $rows * $rowBytes) {
            $out .= substr($decoded, $rows * $rowBytes);
        }

        return $out;
    }

    /**
     * TIFF predictor 2: each sample += the previous sample in this channel (wrapping).
     */
    private function decodePredictor2(string $scanline, int $cols, int $channels, int $bytesPerSample): string
    {
        $samples = $cols * $channels;
        for ($i = $channels; $i < $samples; ++$i) {
            $thisOffset = $i * $bytesPerSample;
            $prevOffset = ($i - $channels) * $bytesPerSample;
            if ($bytesPerSample === 1) {
                $scanline[$thisOffset] = chr((ord($scanline[$thisOffset]) + ord($scanline[$prevOffset])) & 0xFF);
                continue;
            }
            if ($bytesPerSample === 2) {
                $sum = ($this->unpackU16(substr($scanline, $thisOffset, 2)) + $this->unpackU16(substr($scanline, $prevOffset, 2))) & 0xFFFF;
                $packed = $this->littleEndian
                    ? pack('v', $sum)
                    : pack('n', $sum);
                $scanline[$thisOffset] = $packed[0];
                $scanline[$thisOffset + 1] = $packed[1];
                continue;
            }
            $sum = ($this->unpackU32(substr($scanline, $thisOffset, 4)) + $this->unpackU32(substr($scanline, $prevOffset, 4))) & 0xFFFFFFFF;
            $packed = $this->littleEndian
                ? pack('V', $sum)
                : pack('N', $sum);
            $scanline[$thisOffset] = $packed[0];
            $scanline[$thisOffset + 1] = $packed[1];
            $scanline[$thisOffset + 2] = $packed[2];
            $scanline[$thisOffset + 3] = $packed[3];
        }

        return $scanline;
    }

    /**
     * TIFF Technical Note 3: undo byte differencing, then unshuffle byte-planes into native floats.
     */
    private function decodePredictor3(string $scanline, int $cols, int $channels, int $bytesPerSample): string
    {
        $deltaCols = $cols * $bytesPerSample;
        $length = strlen($scanline);
        for ($col = 1; $col < $deltaCols; ++$col) {
            for ($chan = 0; $chan < $channels; ++$chan) {
                $index = $col * $channels + $chan;
                if ($index >= $length) {
                    break 2;
                }
                $scanline[$index] = chr((ord($scanline[$index]) + ord($scanline[($col - 1) * $channels + $chan])) & 0xFF);
            }
        }

        $rowIncrement = $cols * $channels;
        $native = str_repeat("\0", $length);
        for ($col = 0; $col < $rowIncrement; ++$col) {
            for ($byte = 0; $byte < $bytesPerSample; ++$byte) {
                // LE files store planes in semi-big-endian order (MSB plane first).
                $src = $this->littleEndian
                    ? ($bytesPerSample - $byte - 1) * $rowIncrement + $col
                    : $byte * $rowIncrement + $col;
                $dst = $bytesPerSample * $col + $byte;
                if ($src < $length && $dst < $length) {
                    $native[$dst] = $scanline[$src];
                }
            }
        }

        return $native;
    }

    /**
     * @param array{
     *     width: int,
     *     height: int,
     *     samplesPerPixel: int,
     *     bytesPerSample: int,
     *     sampleFormat: int,
     *     compression: int,
     *     predictor: int,
     *     planarConfiguration: int,
     *     tiled: bool,
     *     blockWidth: int,
     *     blockHeight: int,
     *     blocksPerRow: int,
     *     blocksPerCol: int,
     *     offsets: list<int>,
     *     byteCounts: list<int>,
     *     west: float,
     *     east: float,
     *     south: float,
     *     north: float,
     *     resX: float,
     *     resY: float,
     *     bottomUp: bool,
     *     type: string,
     *     unitTypes: array<int, string>,
     *     scale: array<int, float>,
     *     offset: array<int, float>,
     *     nodata: ?float
     * } $directory
     */
    private function unpackSample(array $directory, string $block, int $index): float
    {
        $offset = $index * $directory['bytesPerSample'];
        $bytes = substr($block, $offset, $directory['bytesPerSample']);
        if (strlen($bytes) < $directory['bytesPerSample']) {
            throw new UnknownConversionException('GeoTIFF block is truncated');
        }

        if ($directory['sampleFormat'] === self::SAMPLEFORMAT_IEEEFP) {
            if ($directory['bytesPerSample'] === 4) {
                return (float) $this->unpack($this->floatChar, $bytes)[1];
            }
            if ($directory['bytesPerSample'] === 8) {
                return (float) $this->unpack($this->doubleChar, $bytes)[1];
            }
        }

        $unsigned = $directory['bytesPerSample'] === 1
            ? ord($bytes)
            : ($directory['bytesPerSample'] === 2 ? $this->unpackU16($bytes) : $this->unpackU32($bytes));

        if ($directory['sampleFormat'] === self::SAMPLEFORMAT_INT) {
            $bits = $directory['bytesPerSample'] * 8;
            if ($unsigned >= (1 << ($bits - 1))) { // restore two's complement from unsigned unpack
                $unsigned -= (1 << $bits);
            }
        }

        return (float) $unsigned;
    }

    private function wrapSample(float $value, int $sample): Angle|Length
    {
        assert($this->activeDirectory !== null);
        $unit = $this->activeDirectory['unitTypes'][$sample] ?? '';
        if ($unit === '' && $this->activeDirectory['type'] === 'VELOCITY') {
            $unit = 'millimetres per year'; // GTG default; Rate(1 year) is applied by the point method
        }

        return match ($unit) {
            'millimetres per year', 'millimetre', 'millimeter' => new Millimetre($value),
            'arc-second', 'arc-seconds per year' => new ArcSecond($value),
            'degree' => new Degree($value),
            default => new Metre($value),
        };
    }

    /**
     * Westernmost node among all subgrids (min west).
     */
    private function unionWest(): float
    {
        $west = $this->directories[0]['west'];
        foreach ($this->directories as $directory) {
            $west = min($west, $directory['west']);
        }

        return $west;
    }

    /**
     * Easternmost node among all subgrids (max east).
     */
    private function unionEast(): float
    {
        $east = $this->directories[0]['east'];
        foreach ($this->directories as $directory) {
            $east = max($east, $directory['east']);
        }

        return $east;
    }

    /**
     * Southernmost node among all subgrids (min south).
     */
    private function unionSouth(): float
    {
        $south = $this->directories[0]['south'];
        foreach ($this->directories as $directory) {
            $south = min($south, $directory['south']);
        }

        return $south;
    }

    /**
     * Northernmost node among all subgrids (max north).
     */
    private function unionNorth(): float
    {
        $north = $this->directories[0]['north'];
        foreach ($this->directories as $directory) {
            $north = max($north, $directory['north']);
        }

        return $north;
    }

    private function unpackU16(string $bytes): int
    {
        return (int) $this->unpack($this->u16, $bytes)[1];
    }

    private function unpackU32(string $bytes): int
    {
        return (int) $this->unpack($this->u32, $bytes)[1];
    }
}

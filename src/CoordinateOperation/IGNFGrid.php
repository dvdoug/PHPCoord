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
use SplFixedArray;

use function array_pop;
use function array_slice;
use function assert;
use function count;
use function explode;
use function implode;
use function max;
use function min;
use function str_ends_with;
use function str_repeat;
use function str_replace;
use function str_starts_with;
use function strlen;
use function substr;
use function trim;

trait IGNFGrid
{
    use BilinearInterpolation;

    private int $valuesPerCoordinate;

    /**
     * @var SplFixedArray<array<float>>
     */
    private SplFixedArray $data;

    public function __construct(string $filename)
    {
        $this->gridFile = new GridFile($filename);

        match ($this->gridFile->getExtension()) {
            'txt' => $this->initTxt(),
            'mnt', 'tac' => $this->initMntOrTac(),
            default => throw new UnknownConversionException('Unable to determine file type of file: ' . $this->gridFile->getFilename())
        };
    }

    protected function getRecord(int $longitudeIndex, int $latitudeIndex): GridValues
    {
        $recordId = match ($this->storageOrder) {
            self::STORAGE_ORDER_INCREASING_LATITUDE_INCREASING_LONGITUDE => ($longitudeIndex * $this->numberOfRows + $latitudeIndex),
            self::STORAGE_ORDER_INCREASING_LONGITUDE_DECREASING_LATIITUDE => ($this->numberOfRows - $latitudeIndex - 1) * $this->numberOfColumns + $longitudeIndex,
            self::STORAGE_ORDER_INCREASING_LONGITUDE_INCREASING_LATIITUDE => $latitudeIndex * $this->numberOfColumns + $longitudeIndex,
            default => throw new UnknownConversionException('Unknown storage order for file: ' . $this->gridFile->getFilename())
        };

        assert($this->data[$recordId] !== null);
        $record = $this->data[$recordId];

        $longitude = $longitudeIndex * $this->columnGridInterval + $this->startX;
        $latitude = $latitudeIndex * $this->rowGridInterval + $this->startY;

        return new GridValues($longitude, $latitude, $record);
    }

    private function initTxt(): void
    {
        $this->valuesPerCoordinate = 3;

        $size = $this->gridFile->getSize();
        $contents = $size > 0 ? $this->gridFile->fread($size) : '';
        $lines = $contents === '' ? [] : explode("\n", $contents);
        if ($lines !== [] && str_ends_with($contents, "\n")) {
            array_pop($lines);
        }

        $header1 = $lines[1] ?? '';
        $header2 = $lines[2] ?? '';

        $interpolationMethod = trim(str_replace('GR3D2', '', $header2));
        assert($interpolationMethod === 'INTERPOLATION BILINEAIRE');

        $gridDimensions = explode(' ', trim(Preg::replace('/ +/', ' ', str_replace('GR3D1', '', $header1))));
        $this->startX = (float) $gridDimensions[0];
        $this->endX = (float) $gridDimensions[1];
        $this->startY = (float) $gridDimensions[2];
        $this->endY = (float) $gridDimensions[3];
        $this->columnGridInterval = (float) $gridDimensions[4];
        $this->rowGridInterval = (float) $gridDimensions[5];
        $this->numberOfColumns = (int) (string) (($this->endX - $this->startX) / $this->columnGridInterval) + 1;
        $this->numberOfRows = (int) (string) (($this->endY - $this->startY) / $this->rowGridInterval) + 1;
        $this->storageOrder = self::STORAGE_ORDER_INCREASING_LATITUDE_INCREASING_LONGITUDE;

        $recordCount = $this->numberOfColumns * $this->numberOfRows;
        $this->data = new SplFixedArray($recordCount);
        // Records are sheet code, longitude, latitude, three translations, precision, map sheet.
        // The RGM04 publication has no sheet code, so the translations start one field earlier.
        $blob = implode("\n", array_slice($lines, 4, $recordCount));
        Preg::matchAll('/^ *(\S+) +(\S+) +(\S+) +(\S+) +(\S+) +(\S+)(?: +(\S+))?/m', $blob, $matches);
        if (isset($matches[3], $matches[4], $matches[5], $matches[6], $matches[7])) {
            /** @var list<string> $token3 */
            $token3 = $matches[3];
            /** @var list<string> $token4 */
            $token4 = $matches[4];
            /** @var list<string> $token5 */
            $token5 = $matches[5];
            /** @var list<string> $token6 */
            $token6 = $matches[6];
            /** @var list<string|null> $token7 */
            $token7 = $matches[7];
            for ($i = 0, $matched = count($token3); $i < $matched; ++$i) {
                if ($token7[$i] !== null) {
                    $this->data[$i] = [(float) $token4[$i], (float) $token5[$i], (float) $token6[$i]];
                } else {
                    $this->data[$i] = [(float) $token3[$i], (float) $token4[$i], (float) $token5[$i]];
                }
            }
        }

        // At most one line may follow the nodes.
        assert(count($lines) <= 4 + $recordCount + 1);
    }

    private function initMntOrTac(): void
    {
        $fixedHeaderRegexp = '^(-?[\d.]+) (-?[\d.]+) (-?[\d.]+) (-?[\d.]+) ([\d.]+) ([\d.]+) ([1-4]) ([01]) (\d) ([01]) ';
        $header = $this->gridFile->fgets();
        $headerLength = strlen($header);
        if (str_starts_with($header, "\xEF\xBB\xBF")) {
            $header = substr($header, 3);
        }

        Preg::match('/' . $fixedHeaderRegexp . '/', $header, $fixedHeaderParts);

        $this->startX = min((float) $fixedHeaderParts[1], (float) $fixedHeaderParts[2]);
        $this->endX = max((float) $fixedHeaderParts[1], (float) $fixedHeaderParts[2]);
        $this->startY = min((float) $fixedHeaderParts[3], (float) $fixedHeaderParts[4]);
        $this->endY = max((float) $fixedHeaderParts[3], (float) $fixedHeaderParts[4]);
        $this->columnGridInterval = (float) $fixedHeaderParts[5];
        $this->rowGridInterval = (float) $fixedHeaderParts[6];
        $this->numberOfColumns = (int) (string) (($this->endX - $this->startX) / $this->columnGridInterval) + 1;
        $this->numberOfRows = (int) (string) (($this->endY - $this->startY) / $this->rowGridInterval) + 1;
        $this->storageOrder = (int) $fixedHeaderParts[7];
        $coordinatesIncludedInData = (bool) $fixedHeaderParts[8];
        $this->valuesPerCoordinate = (int) $fixedHeaderParts[9];
        $precisionIncluded = (bool) $fixedHeaderParts[10];

        Preg::match('/' . $fixedHeaderRegexp . str_repeat('(-?[\d.]+) ', $this->valuesPerCoordinate) . '(.*)$/', $header, $fullHeaderParts);

        $baseAdjustments = array_slice($fullHeaderParts, count($fullHeaderParts) - $this->valuesPerCoordinate - 1, $this->valuesPerCoordinate);
        foreach ($baseAdjustments as $baseAdjustment) {
            assert((float) $baseAdjustment === 0.0);
        }

        // these files are not always 1 record per line (sometimes blank lines, sometimes multiple records per row)
        // so direct file access is not possible. Read into memory instead :/

        $this->data = new SplFixedArray($this->numberOfColumns * $this->numberOfRows);

        $rawData = $this->gridFile->fread($this->gridFile->getSize() - $headerLength);
        $values = explode(' ', trim(Preg::replace('/\s+/', ' ', $rawData)));

        $cursor = 0;
        for ($i = 0, $numValues = $this->numberOfColumns * $this->numberOfRows; $i < $numValues; ++$i) {
            if ($coordinatesIncludedInData) {
                $cursor += 2;
            }

            $rowData = [];
            for ($j = 0; $j < $this->valuesPerCoordinate; ++$j) {
                $rowData[] = (float) $values[$cursor];
                ++$cursor;
            }

            $this->data[$i] = $rowData;

            if ($precisionIncluded) {
                ++$cursor;
            }
        }

        $this->gridFile->fgets();
        assert($this->gridFile->eof());
    }
}

<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\Exception\UnknownConversionException;
use PHPCoord\UnitOfMeasure\Length\Metre;

use function in_array;
use function substr;

/**
 * @see https://vdatum.noaa.gov/docs/gtx_info.html for documentation
 */
class GTXGrid extends GeographicGeoidHeightGrid
{
    use BilinearInterpolation;

    private int $headerLength;
    private string $shiftDataType;

    public function __construct(string $filename)
    {
        $this->gridFile = new GridFile($filename);
        $this->storageOrder = self::STORAGE_ORDER_INCREASING_LONGITUDE_INCREASING_LATIITUDE;

        $header = $this->getHeader();
        $this->startX = $header['xlonsw'];
        $this->startY = $header['xlatsw'];
        $this->numberOfColumns = $header['nlon'];
        $this->numberOfRows = $header['nlat'];
        $this->columnGridInterval = $header['dlon'];
        $this->rowGridInterval = $header['dlat'];

        if ($this->startX > 180) { // normalise if necessary
            $this->startX -= 360;
        }
    }

    /**
     * @return Metre[]
     */
    public function getValues(float $x, float $y): array
    {
        if ($x < $this->startX) { // normalise if necessary
            $x += 360;
        }

        $shift = $this->interpolate($x, $y)[0];

        // These are in millimeters for some reason... :/
        if (in_array($this->gridFile->getBasename(), ['vertconc.gtx', 'vertcone.gtx', 'vertconw.gtx'], true)) {
            $shift /= 1000;
        }

        return [new Metre($shift)];
    }

    private function getRecord(int $longitudeIndex, int $latitudeIndex): GridValues
    {
        $recordId = match ($this->storageOrder) {
            self::STORAGE_ORDER_INCREASING_LATITUDE_INCREASING_LONGITUDE => $longitudeIndex * $this->numberOfRows + $latitudeIndex,
            self::STORAGE_ORDER_INCREASING_LONGITUDE_DECREASING_LATIITUDE => ($this->numberOfRows - $latitudeIndex - 1) * $this->numberOfColumns + $longitudeIndex,
            self::STORAGE_ORDER_INCREASING_LONGITUDE_INCREASING_LATIITUDE => $latitudeIndex * $this->numberOfColumns + $longitudeIndex,
            default => throw new UnknownConversionException('Unknown storage order for file: ' . $this->gridFile->getFilename())
        };

        $offset = $this->headerLength + $recordId * 4;
        $this->gridFile->fseek($offset);
        $rawRow = $this->gridFile->fread(4);
        /** @var array{shift: float} $data */
        $data = $this->unpack("{$this->shiftDataType}shift", $rawRow);

        return new GridValues(
            $longitudeIndex * $this->columnGridInterval + $this->startX,
            $latitudeIndex * $this->rowGridInterval + $this->startY,
            [$data['shift']]
        );
    }

    /**
     * @return array{xlatsw: float, xlonsw: float, dlat: float, dlon: float, nlat: int, nlon: int}
     */
    private function getHeader(): array
    {
        $this->gridFile->fseek(0);
        $rawHeader = $this->gridFile->fread(44);
        $ikind = substr($rawHeader, 40, 4);
        if ($this->unpack('Nikind', $ikind)['ikind'] === 1) { // big endian
            $this->headerLength = 44;
            $this->shiftDataType = 'G';
            $data = $this->unpack('Exlatsw/Exlonsw/Edlat/Edlon/Nnlat/Nnlon', $rawHeader);
        } elseif ($this->unpack('Vikind', $ikind)['ikind'] === 1) { // little endian
            $this->headerLength = 44;
            $this->shiftDataType = 'g';
            $data = $this->unpack('exlatsw/exlonsw/edlat/edlon/Vnlat/Vnlon', $rawHeader);
        } else { // not all files (e.g. NZ) have this endian check column, assume big endian
            $this->headerLength = 40;
            $this->shiftDataType = 'G';
            $data = $this->unpack('Exlatsw/Exlonsw/Edlat/Edlon/Nnlat/Nnlon', $rawHeader);
        }

        /** @var array{xlatsw: float, xlonsw: float, dlat: float, dlon: float, nlat: int, nlon: int} */
        return $data;
    }
}

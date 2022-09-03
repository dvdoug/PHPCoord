<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\UnitOfMeasure\Length\Metre;
use SplFileObject;

use function in_array;
use function substr;
use function unpack;

/**
 * @see https://vdatum.noaa.gov/docs/gtx_info.html for documentation
 */
class GTXGrid extends GeographicGeoidHeightGrid
{
    use BilinearInterpolation;

    private int $headerLength;
    private string $shiftDataType;

    public function __construct($filename)
    {
        $this->gridFile = new SplFileObject($filename);
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
    public function getValues($x, $y): array
    {
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
        };

        $offset = $this->headerLength + $recordId * 4;
        $this->gridFile->fseek($offset);
        $rawRow = $this->gridFile->fread(4);
        $data = unpack("{$this->shiftDataType}shift", $rawRow);

        return new GridValues(
            $longitudeIndex * $this->columnGridInterval + $this->startX,
            $latitudeIndex * $this->rowGridInterval + $this->startY,
            [$data['shift']]
        );
    }

    private function getHeader(): array
    {
        $this->gridFile->fseek(0);
        $rawHeader = $this->gridFile->fread(44);
        $ikind = substr($rawHeader, 40, 4);
        if (unpack('Nikind', $ikind)['ikind'] === 1) { // big endian
            $this->headerLength = 44;
            $this->shiftDataType = 'G';
            $data = unpack('Exlatsw/Exlonsw/Edlat/Edlon/Nnlat/Nnlon', $rawHeader);
        } elseif (unpack('Vikind', $ikind)['ikind'] === 1) { // little endian
            $this->headerLength = 44;
            $this->shiftDataType = 'g';
            $data = unpack('exlatsw/exlonsw/edlat/edlon/Vnlat/Vnlon', $rawHeader);
        } else { // not all files (e.g. NZ) have this endian check column, assume big endian
            $this->headerLength = 40;
            $this->shiftDataType = 'G';
            $data = unpack('Exlatsw/Exlonsw/Edlat/Edlon/Nnlat/Nnlon', $rawHeader);
        }

        return $data;
    }
}

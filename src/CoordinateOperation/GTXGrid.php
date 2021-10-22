<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\GeographicPoint;
use PHPCoord\UnitOfMeasure\Length\Metre;
use SplFileObject;
use function substr;
use function unpack;

/**
 * @see https://vdatum.noaa.gov/docs/gtx_info.html for documentation
 */
class GTXGrid extends SplFileObject
{
    private float $startLatitude;
    private float $startLongitude;
    private float $latitudeGridInterval;
    private float $longitudeGridInterval;
    private int $numberLatitudes;
    private int $numberLongitudes;
    private int $headerLength;
    private string $offsetDataType;

    public function __construct($filename)
    {
        parent::__construct($filename);

        $header = $this->getHeader();
        $this->startLatitude = $header['xlatsw'];
        $this->startLongitude = $header['xlonsw'];
        $this->latitudeGridInterval = $header['dlat'];
        $this->longitudeGridInterval = $header['dlon'];
        $this->numberLatitudes = $header['nlat'];
        $this->numberLongitudes = $header['nlon'];

        if ($this->startLongitude > 180) { // normalise if necessary
            $this->startLongitude -= 360;
        }
    }

    /**
     * Converted from NOAA FORTRAN.
     */
    public function getAdjustment(GeographicPoint $point): Metre
    {
        $latitude = $point->getLatitude()->getValue();
        $longitude = $point->getLongitude()->getValue();

        $latitudeIndex = (int) (string) (($latitude - $this->startLatitude) / $this->latitudeGridInterval);
        $longitudeIndex = (int) (string) (($longitude - $this->startLongitude) / $this->longitudeGridInterval);

        $corner0 = $this->getRecord($latitudeIndex, $longitudeIndex);
        $corner1 = $this->getRecord($latitudeIndex + 1, $longitudeIndex);
        $corner2 = $this->getRecord($latitudeIndex + 1, $longitudeIndex + 1);
        $corner3 = $this->getRecord($latitudeIndex, $longitudeIndex + 1);

        $dLatitude = $latitude - ($latitudeIndex * $this->latitudeGridInterval) - $this->startLatitude;
        $dLongitude = $longitude - ($longitudeIndex * $this->longitudeGridInterval) - $this->startLongitude;

        $t = $dLatitude / $this->latitudeGridInterval;
        $u = $dLongitude / $this->longitudeGridInterval;

        $offset = (1 - $t) * (1 - $u) * $corner0 + ($t) * (1 - $u) * $corner1 + ($t) * ($u) * $corner2 + (1 - $t) * ($u) * $corner3;

        return new Metre($offset);
    }

    public function getRecord(int $latitudeIndex, int $longitudeIndex): float
    {
        $offset = $this->headerLength + ($latitudeIndex * $this->numberLongitudes + $longitudeIndex) * 4;
        $this->fseek($offset);
        $rawRow = $this->fread(4);
        $data = unpack("{$this->offsetDataType}offset", $rawRow);

        return $data['offset'];
    }

    private function getHeader(): array
    {
        $this->fseek(0);
        $rawHeader = $this->fread(44);
        $ikind = substr($rawHeader, 40, 4);
        if (unpack('Nikind', $ikind)['ikind'] === 1) { // big endian
            $this->headerLength = 44;
            $this->offsetDataType = 'G';
            $data = unpack('Exlatsw/Exlonsw/Edlat/Edlon/Nnlat/Nnlon', $rawHeader);
        } elseif (unpack('Vikind', $ikind)['ikind'] === 1) { // little endian
            $this->headerLength = 44;
            $this->offsetDataType = 'g';
            $data = unpack('exlatsw/exlonsw/edlat/edlon/Vnlat/Vnlon', $rawHeader);
        } else { // not all files (e.g. NZ) have this endian check column, assume big endian
            $this->headerLength = 40;
            $this->offsetDataType = 'G';
            $data = unpack('Exlatsw/Exlonsw/Edlat/Edlon/Nnlat/Nnlon', $rawHeader);
        }

        return $data;
    }
}

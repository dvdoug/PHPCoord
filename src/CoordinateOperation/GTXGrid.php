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
    use BilinearInterpolation;

    private int $headerLength;
    private string $offsetDataType;

    public function __construct($filename)
    {
        parent::__construct($filename);

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

    public function getAdjustment(GeographicPoint $point): Metre
    {
        $latitude = $point->getLatitude()->getValue();
        $longitude = $point->getLongitude()->getValue();
        $offset = $this->interpolateBilinear($longitude, $latitude)[0];

        // These are in millimeters for some reason... :/
        if (in_array($this->getBasename(), ['vertconc.gtx', 'vertcone.gtx', 'vertconw.gtx'], true)) {
            $offset /= 1000;
        }

        return new Metre($offset);
    }

    private function getRecord(int $longitudeIndex, int $latitudeIndex): GridValues
    {
        $offset = $this->headerLength + ($latitudeIndex * $this->numberOfColumns + $longitudeIndex) * 4;
        $this->fseek($offset);
        $rawRow = $this->fread(4);
        $data = unpack("{$this->offsetDataType}offset", $rawRow);

        return new GridValues(
            $longitudeIndex * $this->columnGridInterval + $this->startX,
            $latitudeIndex * $this->rowGridInterval + $this->startY,
            [$data['offset']]
        );
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

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\GeographicPoint;
use SplFileObject;
use UnexpectedValueException;
use function unpack;

class NADCON5Grid extends SplFileObject
{
    use BiquadraticInterpolation;

    private string $gridDataType;

    public function __construct($filename)
    {
        parent::__construct($filename);

        $header = $this->getHeader();
        $this->startX = $header['xlonsw'];
        $this->startY = $header['xlatsw'];
        $this->columnGridInterval = $header['dlon'];
        $this->rowGridInterval = $header['dlat'];
        $this->numberOfColumns = $header['nlon'];
        $this->numberOfRows = $header['nlat'];

        switch ($header['ikind']) {
            case 1:
                $this->gridDataType = 'G';
                break;
            default:
                throw new UnexpectedValueException("Unknown ikind: {$header['ikind']}");
        }
    }

    public function getForwardAdjustment(GeographicPoint $point): float
    {
        return $this->getAdjustment($point->getLatitude()->asDegrees()->getValue(), $point->getLongitude()->asDegrees()->getValue());
    }

    /**
     * Converted from NOAA FORTRAN.
     */
    private function getAdjustment(float $latitude, float $longitude): float
    {
        if ($longitude < 0) {
            $longitude += 360; // NADCON5 uses 0 = 360 = Greenwich
        }

        // Method:
        // Fit a 3x3 window over the random point. The closest
        // 2x2 points will surround the point. But based on which
        // quadrant of that 2x2 cell in which the point falls, the
        // 3x3 window could extend NW, NE, SW or SE from the 2x2 cell.

        // Find which column should be LEAST when fitting
        // a 3x3 window around $longitude.
        $diflo = ($longitude - $this->startX);
        $ratlo = $diflo / ($this->columnGridInterval / 2);
        $ilo = (int) ($ratlo) + 1;
        if ($ilo % 2 != 0) {
            $xIndex = ($ilo + 1) / 2 - 1;
        } else {
            $xIndex = ($ilo) / 2;
        }

        // Fix any edge overlaps
        if ($xIndex < 1) {
            $xIndex = 1;
        }
        if ($xIndex > $this->numberOfColumns - 2) {
            $xIndex = $this->numberOfColumns - 2;
        }

        // Find which row should be LEAST when fitting
        // a 3x3 window around $latitude.
        $difla = ($latitude - $this->startY);
        $ratla = $difla / ($this->rowGridInterval / 2);
        $ila = (int) ($ratla) + 1;
        if ($ila % 2 != 0) {
            $yIndex = ($ila + 1) / 2 - 1;
        } else {
            $yIndex = ($ila) / 2;
        }

        // Fix any edge overlaps
        if ($yIndex < 1) {
            $yIndex = 1;
        }
        if ($yIndex > $this->numberOfRows - 2) {
            $yIndex = $this->numberOfRows - 2;
        }

        // In the range of 0(westernmost) to
        // 2(easternmost) col, where is our
        // random lon value? That is, x must
        // be real and fall between 0 and 2.
        $x = ($longitude - $this->columnGridInterval * ($xIndex - 1) - $this->startX) / $this->columnGridInterval;

        // In the range of 0(southernmost) to
        // 2(northernmost) row, where is our
        // random lat value? That is, x must
        // be real and fall between 0 and 2.
        $y = ($latitude - $this->rowGridInterval * ($yIndex - 1) - $this->startY) / $this->rowGridInterval;

        $corners = [
            'lowerLeft' => $this->getRecord($xIndex, $yIndex),
            'lowerCentre' => $this->getRecord($xIndex + 1, $yIndex),
            'lowerRight' => $this->getRecord($xIndex + 2, $yIndex),
            'middleLeft' => $this->getRecord($xIndex, $yIndex + 1),
            'middleCentre' => $this->getRecord($xIndex + 1, $yIndex + 1),
            'middleRight' => $this->getRecord($xIndex + 2, $yIndex + 1),
            'upperLeft' => $this->getRecord($xIndex, $yIndex + 2),
            'upperCentre' => $this->getRecord($xIndex + 1, $yIndex + 2),
            'upperRight' => $this->getRecord($xIndex + 2, $yIndex + 2),
        ];

        //Interpolate value at lower row
        $y0 = $this->interpolateQuadratic($x, $corners['lowerLeft'], $corners['lowerCentre'], $corners['lowerRight']);
        //Interpolate value at middle row
        $y1 = $this->interpolateQuadratic($x, $corners['middleLeft'], $corners['middleCentre'], $corners['middleRight']);
        //Interpolate value at upper row
        $y2 = $this->interpolateQuadratic($x, $corners['upperLeft'], $corners['upperCentre'], $corners['upperRight']);

        //Interpolate between rows
        return $this->interpolateQuadratic($y, $y0, $y1, $y2);
    }

    public function getRecord(int $longitudeIndex, int $latitudeIndex): float
    {
        $startBytes = 52;
        $dataTypeBytes = $this->gridDataType === 'n' ? 2 : 4;
        $recordLength = 4 + $this->numberOfColumns * $dataTypeBytes + 4;

        $this->fseek($startBytes + $recordLength * ($latitudeIndex - 1));
        $rawRow = $this->fread($recordLength);
        $row = unpack("Gstartbuffer/{$this->gridDataType}{$this->numberOfColumns}lon/Gendbuffer", $rawRow);

        return $row['lon' . ($longitudeIndex)];
    }

    private function getHeader(): array
    {
        $this->fseek(0);
        $rawData = $this->fread(52);
        $data = unpack('Gstartbuffer/Exlatsw/Exlonsw/Edlat/Edlon/Nnlat/Nnlon/Nikind/Gendbuffer/', $rawData);

        return $data;
    }
}

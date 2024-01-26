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
    private float $startLatitude;
    private float $startLongitude;
    private float $latitudeGridSize;
    private float $longitudeGridSize;
    private int $numberLatitudes;
    private int $numberLongitudes;
    private string $gridDataType;

    public function __construct($filename)
    {
        parent::__construct($filename);

        $header = $this->getHeader();
        $this->startLatitude = $header['xlatsw'];
        $this->startLongitude = $header['xlonsw'];
        $this->latitudeGridSize = $header['dlat'];
        $this->longitudeGridSize = $header['dlon'];
        $this->numberLatitudes = $header['nlat'];
        $this->numberLongitudes = $header['nlon'];

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

        // Find which row should be LEAST when fitting
        // a 3x3 window around $latitude.
        $difla = ($latitude - $this->startLatitude);
        $ratla = $difla / ($this->latitudeGridSize / 2);
        $ila = (int) $ratla + 1;
        if ($ila % 2 != 0) {
            $jla = ($ila + 1) / 2 - 1;
        } else {
            $jla = $ila / 2;
        }

        // Fix any edge overlaps
        if ($jla < 1) {
            $jla = 1;
        }
        if ($jla > $this->numberLatitudes - 2) {
            $jla = $this->numberLatitudes - 2;
        }

        // Find which column should be LEAST when fitting
        // a 3x3 window around $longitude.
        $diflo = ($longitude - $this->startLongitude);
        $ratlo = $diflo / ($this->longitudeGridSize / 2);
        $ilo = (int) $ratlo + 1;
        if ($ilo % 2 != 0) {
            $jlo = ($ilo + 1) / 2 - 1;
        } else {
            $jlo = $ilo / 2;
        }

        // Fix any edge overlaps
        if ($jlo < 1) {
            $jlo = 1;
        }
        if ($jlo > $this->numberLongitudes - 2) {
            $jlo = $this->numberLongitudes - 2;
        }

        // In the range of 0(westernmost) to
        // 2(easternmost) col, where is our
        // random lon value? That is, x must
        // be real and fall between 0 and 2.
        $x = ($longitude - $this->longitudeGridSize * ($jlo - 1) - $this->startLongitude) / $this->longitudeGridSize;

        // In the range of 0(southernmost) to
        // 2(northernmost) row, where is our
        // random lat value? That is, x must
        // be real and fall between 0 and 2.
        $y = ($latitude - $this->latitudeGridSize * ($jla - 1) - $this->startLatitude) / $this->latitudeGridSize;

        // Now do the interpolation. First, build a parabola
        // east-west the southermost row and interpolate to longitude
        // "xlo" (at "x" for 0<x<2). Then do it in the middle
        // row, then finally the northern row. The last step
        // is to fit a parabola north-south at the three previous
        // interpolations, but this time to interpolate to
        // latitude "xla" (at "y" for 0<y<2). Obviously we
        // could reverse the order, doing 3 north-south parabolas
        // followed by one east-east and we'd get the same answer.

        $fx0 = $this->qterp($x, $this->getRecord($jla, $jlo), $this->getRecord($jla, $jlo + 1), $this->getRecord($jla, $jlo + 2));
        $fx1 = $this->qterp($x, $this->getRecord($jla + 1, $jlo), $this->getRecord($jla + 1, $jlo + 1), $this->getRecord($jla + 1, $jlo + 2));
        $fx2 = $this->qterp($x, $this->getRecord($jla + 2, $jlo), $this->getRecord($jla + 2, $jlo + 1), $this->getRecord($jla + 2, $jlo + 2));

        return $this->qterp($y, $fx0, $fx1, $fx2);
    }

    public function getRecord(int $latitudeIndex, int $longitudeIndex): float
    {
        $startBytes = 52;
        $dataTypeBytes = $this->gridDataType === 'n' ? 2 : 4;
        $recordLength = 4 + $this->numberLongitudes * $dataTypeBytes + 4;

        $this->fseek($startBytes + $recordLength * ($latitudeIndex - 1));
        $rawRow = $this->fread($recordLength);
        $row = unpack("Gstartbuffer/{$this->gridDataType}{$this->numberLongitudes}lon/Gendbuffer", $rawRow);

        return $row['lon' . $longitudeIndex];
    }

    private function getHeader(): array
    {
        $this->fseek(0);
        $rawData = $this->fread(52);
        $data = unpack('Gstartbuffer/Exlatsw/Exlonsw/Edlat/Edlon/Nnlat/Nnlon/Nikind/Gendbuffer/', $rawData);

        return $data;
    }

    /**
     * Converted from NOAA FORTRAN.
     * This function fits a parabola (quadratic) through
     * three points, *equally* spaced along the x-axis
     * at indices 0, 1 and 2. The spacing along the
     * x-axis is "dx"
     * Thus:.
     *
     * f0 = y(x(0))
     * f1 = y(x(1))
     * f2 = y(x(2))
     * Where
     * x(1) = x(0) + dx
     * x(2) = x(1) + dx
     * The input value is some value of "x" that falls
     * between 0 and 2. The output value is
     * the parabolic function at x.
     *
     * This function uses Newton-Gregory forward polynomial.
     */
    private function qterp(float $x, float $f0, float $f1, float $f2): float
    {
        $df0 = $f1 - $f0;
        $df1 = $f2 - $f1;
        $d2f0 = $df1 - $df0;

        return $f0 + $x * $df0 + 0.5 * $x * ($x - 1.0) * $d2f0;
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\Datum\Datum;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;

use function abs;
use function atan2;
use function cos;
use function hypot;
use function sin;
use function sqrt;

/**
 * A geocentric point w/out a CRS.
 * @internal
 */
class GeocentricValue
{
    protected const ITERATION_CONVERGENCE = 1e-10;

    private Metre$x;

    private Metre $y;

    private Metre $z;

    private Datum $datum;

    public function __construct(Length $x, Length $y, Length $z, Datum $datum)
    {
        $this->x = $x->asMetres();
        $this->y = $y->asMetres();
        $this->z = $z->asMetres();
        $this->datum = $datum;
    }

    public function getX(): Metre
    {
        return $this->x;
    }

    public function getY(): Metre
    {
        return $this->y;
    }

    public function getZ(): Metre
    {
        return $this->z;
    }

    public function asGeographicValue(): GeographicValue
    {
        $ellipsoid = $this->datum->getEllipsoid();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $ellipsoid->getEccentricitySquared();
        $x = $this->x->getValue();
        $y = $this->y->getValue();
        $z = $this->z->getValue();

        $longitude = atan2($y, $x);
        $longitude += $this->datum->getPrimeMeridian()->getGreenwichLongitude()->asRadians()->getValue();
        $p = hypot($x, $y);

        $latitude = atan2($z, $p * (1 - $e2));

        do {
            $phi1 = $latitude;
            $v = $a / sqrt(1 - $e2 * (sin($latitude) ** 2));
            $latitude = atan2($z + ($e2 * $v * sin($latitude)), $p);
        } while (abs($latitude - $phi1) >= static::ITERATION_CONVERGENCE);

        $h = $p / cos($latitude) - $v;

        return new GeographicValue(new Radian($latitude), new Radian($longitude), new Metre($h), $this->datum);
    }
}

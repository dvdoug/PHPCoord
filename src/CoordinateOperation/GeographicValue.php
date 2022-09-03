<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\Datum\Datum;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;

use function cos;
use function sin;
use function sqrt;

/**
 * A geographic point w/out a CRS.
 * @internal
 */
class GeographicValue
{
    private Radian $latitude;

    private Radian $longitude;

    private ?Metre $height;

    private Datum $datum;

    public function __construct(Angle $latitude, Angle $longitude, ?Length $height, Datum $datum)
    {
        $this->latitude = $this->normaliseLatitude($latitude)->asRadians();
        $this->longitude = $this->normaliseLongitude($longitude)->asRadians();
        $this->datum = $datum;

        $this->height = $height ? $height->asMetres() : null;
    }

    public function getLatitude(): Radian
    {
        return $this->latitude;
    }

    public function getLongitude(): Radian
    {
        return $this->longitude;
    }

    public function getHeight(): ?Metre
    {
        return $this->height;
    }

    public function getDatum(): Datum
    {
        return $this->datum;
    }

    public function asGeocentricValue(): GeocentricValue
    {
        $ellipsoid = $this->datum->getEllipsoid();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $ellipsoid->getEccentricitySquared();
        $latitude = $this->latitude->getValue();
        $longitude = $this->longitude->getValue() - $this->datum->getPrimeMeridian()->getGreenwichLongitude()->asRadians()->getValue();
        $h = isset($this->height) ? $this->height->getValue() : 0;

        $nu = $a / sqrt(1 - $e2 * (sin($latitude) ** 2));
        $x = ($nu + $h) * cos($latitude) * cos($longitude);
        $y = ($nu + $h) * cos($latitude) * sin($longitude);
        $z = ((1 - $e2) * $nu + $h) * sin($latitude);

        return new GeocentricValue(new Metre($x), new Metre($y), new Metre($z), $this->datum);
    }

    protected function normaliseLatitude(Angle $latitude): Angle
    {
        if ($latitude->asDegrees()->getValue() > 90) {
            return new Degree(90);
        }
        if ($latitude->asDegrees()->getValue() < -90) {
            return new Degree(-90);
        }

        return $latitude;
    }

    protected function normaliseLongitude(Angle $longitude): Angle
    {
        while ($longitude->asDegrees()->getValue() > 180) {
            $longitude = $longitude->subtract(new Degree(360));
        }
        while ($longitude->asDegrees()->getValue() <= -180) {
            $longitude = $longitude->add(new Degree(360));
        }

        return $longitude;
    }
}

<?php

declare(strict_types=1);

namespace PHPCoord;

/**
 * Irish Transverse Mercator grid ref (the new Irish Grid system)
 * References are accurate to 1m.
 * @author Doug Wright
 */
class IsraeliTMRef extends TransverseMercator
{
    /**
     * @return RefEll
     */
    public function getReferenceEllipsoid(): RefEll
    {
        return RefEll::grs80();
    }

    /**
     * @return float
     */
    public function getScaleFactor(): float
    {
        return 1.0000067;
    }

    /**
     * @return int
     */
    public function getOriginNorthing(): int
    {
        return 631556;
    }

    /**
     * @return int
     */
    public function getOriginEasting(): int
    {
        return 222286;
    }

    /**
     * @return float
     */
    public function getOriginLatitude(): float
    {
        return 31.73439361;
    }

    /**
     * @return float
     */
    public function getOriginLongitude(): float
    {
        return 35.20444444;
    }

    /**
     * @param int $x
     * @param int $y
     * @param int $z
     */
    public function __construct($x, $y, $z = 0)
    {
        parent::__construct($x, $y, $z, RefEll::grs80());
    }

    /**
     * Convert this grid reference into a latitude and longitude.
     * @return LatLng
     */
    public function toLatLng(): LatLng
    {
        $N = $this->y;
        $E = $this->x;
        $N0 = $this->getOriginNorthing();
        $E0 = $this->getOriginEasting();
        $phi0 = $this->getOriginLatitude();
        $lambda0 = $this->getOriginLongitude();

        return $this->convertToLatitudeLongitude($N, $E, $N0, $E0, $phi0, $lambda0);
    }

    /**
     * String version of coordinate.
     * @return string
     */
    public function __toString(): string
    {
        return "({$this->x}, {$this->y})";
    }
}

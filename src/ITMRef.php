<?php

declare(strict_types=1);

namespace PHPCoord;

/**
 * Irish Transverse Mercator grid ref (the new Irish Grid system)
 * References are accurate to 1m.
 * @author Doug Wright
 */
class ITMRef extends TransverseMercator
{
    public function getReferenceEllipsoid(): RefEll
    {
        return RefEll::grs80();
    }

    public function getScaleFactor(): float
    {
        return 0.999820;
    }

    public function getOriginNorthing(): int
    {
        return 750000;
    }

    public function getOriginEasting(): int
    {
        return 600000;
    }

    public function getOriginLatitude(): float
    {
        return 53.5;
    }

    public function getOriginLongitude(): float
    {
        return -8;
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
     */
    public function __toString(): string
    {
        return "({$this->x}, {$this->y})";
    }
}

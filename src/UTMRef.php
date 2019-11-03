<?php

declare(strict_types=1);

namespace PHPCoord;

use function ord;

/**
 * UTM reference.
 * @author Jonathan Stott
 * @author Doug Wright
 */
class UTMRef extends TransverseMercator
{
    /**
     * Latitude zone.
     * @var string
     */
    protected $latZone;

    /**
     * Longitude zone.
     * @var int
     */
    protected $lngZone;

    /**
     * Create a new object representing a UTM reference.
     */
    public function __construct(int $x, int $y, int $z, string $latZone, int $lngZone)
    {
        $this->latZone = $latZone;
        $this->lngZone = $lngZone;

        parent::__construct($x, $y, $z, RefEll::wgs84());
    }

    public function getLatZone(): string
    {
        return $this->latZone;
    }

    public function getLngZone(): int
    {
        return $this->lngZone;
    }

    public function getReferenceEllipsoid(): RefEll
    {
        return RefEll::wgs84();
    }

    public function getScaleFactor(): float
    {
        return 0.9996;
    }

    public function getOriginNorthing(): int
    {
        return 0;
    }

    public function getOriginEasting(): int
    {
        return 500000;
    }

    public function getOriginLatitude(): float
    {
        return 0;
    }

    public function getOriginLongitude(): float
    {
        return ($this->lngZone - 1) * 6 - 180 + 3;
    }

    /**
     * Return a string representation of this UTM reference.
     */
    public function __toString(): string
    {
        return "{$this->lngZone}{$this->latZone} {$this->x} {$this->y}";
    }

    /**
     * Convert this UTM reference to a WGS84 latitude and longitude.
     */
    public function toLatLng(): LatLng
    {
        $N = $this->y;
        $E = $this->x;
        $N0 = $this->getOriginNorthing();
        $E0 = $this->getOriginEasting();
        $phi0 = $this->getOriginLatitude();
        $lambda0 = $this->getOriginLongitude();

        //Correct northing for southern hemisphere
        if ((ord($this->latZone) - ord('N')) < 0) {
            $N -= 10000000;
        }

        return $this->convertToLatitudeLongitude($N, $E, $N0, $E0, $phi0, $lambda0);
    }
}

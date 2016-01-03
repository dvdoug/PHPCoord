<?php
/**
 * PHPCoord
 * @package PHPCoord
 * @author Doug Wright
 */
namespace PHPCoord;

/**
 * Irish Transverse Mercator grid ref (the new Irish Grid system)
 * References are accurate to 1m
 * @author Doug Wright
 * @package PHPCoord
 */
class ITMRef extends TransverseMercator
{

    public function getReferenceEllipsoid()
    {
        return RefEll::grs80();
    }

    public function getScaleFactor()
    {
        return 0.999820;
    }

    public function getOriginNorthing()
    {
        return 750000;
    }

    public function getOriginEasting()
    {
        return 600000;
    }

    public function getOriginLatitude()
    {
        return 53.5;
    }

    public function getOriginLongitude()
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
     * Convert this grid reference into a latitude and longitude
     * @return LatLng
     */
    public function toLatLng()
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
    public function __toString()
    {
        return "({$this->x}, {$this->y})";
    }
}

<?php
/**
 * PHPCoord
 * @package PHPCoord
 * @author Jonathan Stott
 * @author Doug Wright
 */
namespace PHPCoord;

class AlabamaGrid extends TransverseMercator
{

    CONST FEET_TO_METERS = 0.3048;

    public function getReferenceEllipsoid()
    {
        return RefEll::grs80();
    }

    public function getScaleFactor()
    {
        return 0.99996;
    }

    public function getOriginNorthing()
    {
        return 0;
    }

    public function getOriginEasting()
    {
        return 656166.6666666665 * static::FEET_TO_METERS;
    }

    public function getOriginLatitude()
    {
        return 30.5;
    }

    public function getOriginLongitude()
    {
        return -85.83333333333333;
    }

    /**
     * Create a new object representing grid ref
     *
     * @param int $x
     * @param int $y
     * @param int $z
     */
    public function __construct($x, $y, $z = 0)
    {
        $x = $x * static::FEET_TO_METERS;
        $y = $y * static::FEET_TO_METERS;

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

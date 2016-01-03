<?php
/**
 * PHPCoord
 * @package PHPCoord
 * @author Jonathan Stott
 * @author Doug Wright
 */
namespace PHPCoord;

/**
 * UTM reference
 * @author Jonathan Stott
 * @author Doug Wright
 * @package PHPCoord
 */
class UTMRef extends TransverseMercator
{

    /**
     * Latitude zone
     * @var string
     */
    protected $latZone;

    /**
     * Longitude zone
     * @var int
     */
    protected $lngZone;

    /**
     * Create a new object representing a UTM reference.
     *
     * @param int $x
     * @param int $y
     * @param int $z
     * @param string $latZone
     * @param int $lngZone
     */
    public function __construct($x, $y, $z, $latZone, $lngZone)
    {
        $this->latZone = $latZone;
        $this->lngZone = $lngZone;

        parent::__construct($x, $y, $z, RefEll::wgs84());
    }

    /**
     * @return string
     */
    public function getLatZone()
    {
        return $this->latZone;
    }

    /**
     * @param string $latZone
     */
    public function setLatZone($latZone)
    {
        $this->latZone = $latZone;
    }

    /**
     * @return int
     */
    public function getLngZone()
    {
        return $this->lngZone;
    }

    /**
     * @param int $lngZone
     */
    public function setLngZone($lngZone)
    {
        $this->lngZone = $lngZone;
    }


    public function getReferenceEllipsoid()
    {
        return RefEll::wgs84();
    }

    public function getScaleFactor()
    {
        return 0.9996;
    }

    public function getOriginNorthing()
    {
        return 0;
    }

    public function getOriginEasting()
    {
        return 500000;
    }

    public function getOriginLatitude()
    {
        return 0;
    }

    public function getOriginLongitude()
    {
        return ($this->lngZone - 1) * 6 - 180 + 3;
    }


    /**
     * Return a string representation of this UTM reference
     * @return string
     */
    public function __toString()
    {
        return "{$this->lngZone}{$this->latZone} {$this->x} {$this->y}";
    }

    /**
     * Convert this UTM reference to a WGS84 latitude and longitude
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

        //Correct northing for southern hemisphere
        if ((ord($this->latZone) - ord("N")) < 0) {
            $N -= 10000000;
        }

        return $this->convertToLatitudeLongitude($N, $E, $N0, $E0, $phi0, $lambda0);
    }
}

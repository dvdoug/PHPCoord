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
     * Easting
     * @api
     * @var int
     */
    public $easting;

    /**
     * Easting
     * @api
     * @var int
     */
    public $northing;

    /**
     * Latitude zone
     * @api
     * @var string
     */
    public $latZone;

    /**
     * Longitude zone
     * @api
     * @var string
     */
    public $lngZone;

    /**
     * Create a new object representing a UTM reference.
     *
     * @param int $aEasting
     * @param int $aNorthing
     * @param string $aLatZone
     * @param int $aLngZone
     */
    public function __construct($aEasting, $aNorthing, $aLatZone, $aLngZone)
    {
        $this->latZone = $aLatZone;
        $this->lngZone = $aLngZone;

        parent::__construct($aEasting, $aNorthing);
    }

    public function getReferenceEllipsoid()
    {
        return RefEll::WGS84();
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
        return "{$this->lngZone}{$this->latZone} {$this->easting} {$this->northing}";
    }

    /**
     * Convert this UTM reference to a WGS84 latitude and longitude
     * @return LatLng
     */
    public function toLatLng()
    {
        $N = $this->northing;
        $E = $this->easting;
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

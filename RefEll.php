<?php
/**
 * PHPCoord
 * @package PHPCoord
 * @author Jonathan Stott
 * @author Doug Wright
 */
namespace PHPCoord;

/**
 * Reference ellipsoid
 * @author Jonathan Stott
 * @author Doug Wright
 * @package PHPCoord
 */
class RefEll
{

    /**
     * Major axis
     * @var float
     */
    protected $maj;

    /**
     * Minor axis
     * @var float
     */
    protected $min;

    /**
     * Eccentricity
     * @var float
     */
    protected $ecc;

    /**
     * Create a new RefEll object to represent a reference ellipsoid
     *
     * @param float $maj the major axis
     * @param float $min the minor axis
     */
    public function __construct($maj, $min)
    {
        $this->maj = $maj;
        $this->min = $min;
        $this->ecc = (($maj * $maj) - ($min * $min)) / ($maj * $maj);
    }

    /**
     * @return float
     */
    public function getMaj()
    {
        return $this->maj;
    }

    /**
     * @return float
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @return float
     */
    public function getEcc()
    {
        return $this->ecc;
    }


    /**
     * Helper function to create Airy1830 ellipsoid used in GB
     * @return RefEll
     */
    public static function airy1830()
    {
        return new RefEll(6377563.396, 6356256.909);
    }

    /**
     * Helper function to create Airy Modified ellipsoid used by Ireland
     * @return RefEll
     */
    public static function airyModified()
    {
        return new RefEll(6377340.189, 6356034.447);
    }

    /**
     * Helper function to create WGS84 ellipsoid
     * @return RefEll
     */
    public static function wgs84()
    {
        return new RefEll(6378137, 6356752.314245);
    }

    /**
     * Helper function to create GRS80 ellipsoid
     * @return RefEll
     */
    public static function grs80()
    {
        return new RefEll(6378137, 6356752.314140);
    }

    /**
     * Helper function to create Clarke1866 ellipsoid
     * @return RefEll
     */
    public static function clarke1866()
    {
        return new RefEll(6378206.4, 6356583.8);
    }

    /**
     * Helper function to create International 1924 (Hayford) ellipsoid
     * @return RefEll
     */
    public static function international1924()
    {
        return new RefEll(6378388.0, 6356911.9);
    }

    /**
     * Helper function to create Bessel 1841 ellipsoid
     * @return RefEll
     */
    public static function bessel1841()
    {
        return new RefEll(6377397.155, 6356078.963);
    }
}

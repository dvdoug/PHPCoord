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
     * @api
     * @var float
     */
    public $maj;

    /**
     * Minor axis
     * @api
     * @var float
     */
    public $min;

    /**
     * Eccentricity
     * @api
     * @var float
     */
    public $ecc;

    /**
     * Create a new RefEll object to represent a reference ellipsoid
     *
     * @param float $aMaj the major axis
     * @param float $aMin the minor axis
     */
    public function __construct($aMaj, $aMin)
    {
        $this->maj = $aMaj;
        $this->min = $aMin;
        $this->ecc = (($aMaj * $aMaj) - ($aMin * $aMin)) / ($aMaj * $aMaj);
    }

    /**
     * Helper function to create Airy1830 ellipsoid
     * @return RefEll
     */
    public static function Airy1830()
    {
        return new RefEll(6377563.396, 6356256.909);
    }

    /**
     * Helper function to create WGS84 ellipsoid
     * @return RefEll
     */
    public static function WGS84()
    {
        return new RefEll(6378137, 6356752.314245);
    }

    /**
     * Helper function to create GRS80 ellipsoid
     * @return RefEll
     */
    public static function GRS80()
    {
        return new RefEll(6378137, 6356752.314140);
    }

    /**
     * Helper function to create GRS80 ellipsoid
     * @return RefEll
     */
    public static function Clarke1866()
    {
        return new RefEll(6378206.4, 6356583.8);
    }

    /**
     * Helper function to create International 1924 (Heyford) ellipsoid
     * @return RefEll
     */
    public static function International1924()
    {
        return new RefEll(6378388.0, 6356911.9);
    }

    /**
     * Helper function to create International 1924 (Heyford) ellipsoid
     * @return RefEll
     */
    public static function Heyford1924()
    {
        return new RefEll(6378388.0, 6356911.9);
    }

    /**
     * Helper function to create Bessel 1841 ellipsoid
     * @return RefEll
     */
    public static function Bessel1841()
    {
        return new RefEll(6377397.155, 6356078.963);
    }

}

<?php
/**
 * PHPCoord
 * @package PHPCoord
 * @author Doug Wright
 */
namespace PHPCoord;

/**
 * Irish grid reference (pre-ITM)
 * References are accurate to 1m
 * @author Doug Wright
 * @package PHPCoord
 */
class IrishGridRef extends TransverseMercator
{

    const GRID_LETTERS = "VWXYZQRSTULMNOPFGHJKABCDE";

    public function getReferenceEllipsoid()
    {
        return RefEll::airyModified();
    }

    public function getScaleFactor()
    {
        return 1.000035;
    }

    public function getOriginNorthing()
    {
        return 250000;
    }

    public function getOriginEasting()
    {
        return 200000;
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
     */
    public function __construct($x, $y)
    {
        parent::__construct($x, $y, 0, RefEll::airyModified());
    }

    /**
     * Take a string formatted as a six-figure grid reference (e.g.
     * "T514131") and return a reference to an IrishGridRef object that represents
     * that grid reference.
     *
     * @param string $ref
     * @return IrishGridRef
     */
    public static function fromSixFigureReference($ref)
    {

        $easting = strpos(self::GRID_LETTERS, $ref[0]) % 5  * 100000 + (substr($ref, 1, 3) * 100);
        $northing = (floor(strpos(self::GRID_LETTERS, $ref[0]) / 5)) * 100000 + (substr($ref, 4, 3) * 100);

        return new IrishGridRef($easting, $northing);
    }

    /**
     * Convert this grid reference into a string using a standard six-figure
     * grid reference including the character designation for the 100km
     * square. e.g. T514131.
     * @return string
     */
    public function toSixFigureReference()
    {

        $easting = str_pad($this->x, 6, 0, STR_PAD_LEFT);
        $northing = str_pad($this->y, 6, 0, STR_PAD_LEFT);

        //100km grid sq, origin at 0,0
        $minorSquaresEast = $easting[0] % 5;
        $minorSquaresNorth = $northing[0] % 5;
        $minorLetterIndex = (int)(5 * $minorSquaresNorth + $minorSquaresEast);
        $minorLetter = substr(self::GRID_LETTERS, $minorLetterIndex, 1);

        return $minorLetter . substr($easting, 1, 3) . substr($northing, 1, 3);
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

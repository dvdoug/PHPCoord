<?php
/**
 * PHPCoord
 * @package PHPCoord
 * @author Jonathan Stott
 * @author Doug Wright
 */
namespace PHPCoord;

/**
 * Ordnance Survey grid reference
 * References are accurate to 1m
 * @author Jonathan Stott
 * @author Doug Wright
 * @package PHPCoord
 */
class OSRef extends TransverseMercator
{

    const GRID_LETTERS = "VWXYZQRSTULMNOPFGHJKABCDE";

    public function getReferenceEllipsoid()
    {
        return RefEll::airy1830();
    }

    public function getScaleFactor()
    {
        return 0.9996012717;
    }

    public function getOriginNorthing()
    {
        return -100000;
    }

    public function getOriginEasting()
    {
        return 400000;
    }

    public function getOriginLatitude()
    {
        return 49;
    }

    public function getOriginLongitude()
    {
        return -2;
    }

    /**
     * Create a new object representing a OSGB reference.
     *
     * @param int $x
     * @param int $y
     * @param int $z
     */
    public function __construct($x, $y, $z = 0)
    {
        parent::__construct($x, $y, $z, RefEll::airy1830());
    }

    /**
     * Take a string formatted as a six-figure OS grid reference (e.g.
     * "TG514131") and return a reference to an OSRef object that represents
     * that grid reference.
     *
     * @param string $ref
     * @return OSRef
     */
    public static function fromSixFigureReference($ref)
    {

        //first (major) letter is the 500km grid sq, origin at -1000000, -500000
        $majorEasting = strpos(self::GRID_LETTERS, $ref[0]) % 5  * 500000 - 1000000;
        $majorNorthing = (floor(strpos(self::GRID_LETTERS, $ref[0]) / 5)) * 500000 - 500000;

        //second (minor) letter is 100km grid sq, origin at 0,0 of this square
        $minorEasting = strpos(self::GRID_LETTERS, $ref[1]) % 5  * 100000;
        $minorNorthing = (floor(strpos(self::GRID_LETTERS, $ref[1]) / 5)) * 100000;

        $easting = $majorEasting + $minorEasting + (substr($ref, 2, 3) * 100);
        $northing = $majorNorthing + $minorNorthing + (substr($ref, 5, 3) * 100);

        return new OSRef($easting, $northing);
    }

    /**
     * Convert this grid reference into a grid reference string of a 
     * given length (2, 4, 6, 8 or 10) including the two-character 
     * designation for the 100km square. e.g. TG514131.
     * @return string
     */
    private function toGridReference($length)
    {

        $halfLength = $length / 2;

        $easting = str_pad($this->x, 6, 0, STR_PAD_LEFT);
        $northing = str_pad($this->y, 6, 0, STR_PAD_LEFT);


        $adjustedX = $this->x + 1000000;
        $adjustedY = $this->y + 500000;
        $majorSquaresEast = floor($adjustedX / 500000);
        $majorSquaresNorth = floor($adjustedY / 500000);
        $majorLetterIndex = (int)(5 * $majorSquaresNorth + $majorSquaresEast);
        $majorLetter = substr(self::GRID_LETTERS, $majorLetterIndex, 1);

        //second (minor) letter is 100km grid sq, origin at 0,0 of this square
        $minorSquaresEast = $easting[0] % 5;
        $minorSquaresNorth = $northing[0] % 5;
        $minorLetterIndex = (int)(5 * $minorSquaresNorth + $minorSquaresEast);
        $minorLetter = substr(self::GRID_LETTERS, $minorLetterIndex, 1);

        return $majorLetter . $minorLetter . substr($easting, 1, $halfLength) . substr($northing, 1, $halfLength);
    }

    /**
     * Convert this grid reference into a string using a standard two-figure
     * grid reference including the two-character designation for the 100km
     * square. e.g. TG51 (10km square).
     * @return string
     */
    public function toTwoFigureReference()
    {
        return $this->toGridReference(2);
    }

    /**
     * Convert this grid reference into a string using a standard four-figure
     * grid reference including the two-character designation for the 100km
     * square. e.g. TG5113 (1km square).
     * @return string
     */
    public function toFourFigureReference()
    {
        return $this->toGridReference(4);
    }

    /**
     * Convert this grid reference into a string using a standard six-figure
     * grid reference including the two-character designation for the 100km
     * square. e.g. TG514131 (100m square).
     * @return string
     */
    public function toSixFigureReference()
    {
        return $this->toGridReference(6);
    }

    /**
     * Convert this grid reference into a string using a standard eight-figure
     * grid reference including the two-character designation for the 100km
     * square. e.g. TG51431312 (10m square).
     * @return string
     */
    public function toEightFigureReference()
    {
        return $this->toGridReference(8);
    }

    /**
     * Convert this grid reference into a string using a standard ten-figure
     * grid reference including the two-character designation for the 100km
     * square. e.g. TG5143113121 (1m square).
     * @return string
     */
    public function toTenFigureReference()
    {
        return $this->toGridReference(10);
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

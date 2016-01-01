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

    public function getReferenceEllipsoid()
    {
        return RefEll::Airy1830();
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
     * Create a new object representing a UTM reference.
     *
     * @param int $x
     * @param int $y
     */
    public function __construct($x, $y)
    {
        parent::__construct($x, $y, 0, RefEll::Airy1830());
    }

    /**
     * Take a string formatted as a six-figure OS grid reference (e.g.
     * "TG514131") and return a reference to an OSRef object that represents
     * that grid reference. The first character must be H, N, S, O or T.
     * The second character can be any uppercase character from A through Z
     * excluding I.
     *
     * @param string $ref
     * @return OSRef
     */
    public static function getOSRefFromSixFigureReference($ref)
    {
        $char1 = substr($ref, 0, 1);
        $char2 = substr($ref, 1, 1);
        $east = substr($ref, 2, 3) * 100;
        $north = substr($ref, 5, 3) * 100;
        if ($char1 == 'H') {
            $north += 1000000;
        } else {
            if ($char1 == 'N') {
                $north += 500000;
            } else {
                if ($char1 == 'O') {
                    $north += 500000;
                    $east += 500000;
                } else {
                    if ($char1 == 'T') {
                        $east += 500000;
                    }
                }
            }
        }
        $char2ord = ord($char2);
        if ($char2ord > 73) { // Adjust for no I
            $char2ord--;
        }
        $nx = (($char2ord - 65) % 5) * 100000;
        $ny = (4 - floor(($char2ord - 65) / 5)) * 100000;
        return new OSRef($east + $nx, $north + $ny);
    }

    /**
     * Convert this grid reference into a string using a standard six-figure
     * grid reference including the two-character designation for the 100km
     * square. e.g. TG514131.
     * @return string
     */
    public function toSixFigureString()
    {

        $easting = str_pad($this->x, 6, 0, STR_PAD_LEFT);
        $northing = str_pad($this->y, 6, 0, STR_PAD_LEFT);

        $hundredkmE = $easting[0];
        $hundredkmN = $northing[0];

        if ($hundredkmN < 5 && $hundredkmE < 5) {
            $firstLetter = 'S';
        } else {
            if ($hundredkmN < 5 && $hundredkmE >= 5) {
                $firstLetter = 'T';
            } else {
                if ($hundredkmN < 10 && $hundredkmE < 5) {
                    $firstLetter = 'N';
                } else {
                    if ($hundredkmN < 10 && $hundredkmE >= 5) {
                        $firstLetter = 'O';
                    } else {
                        $firstLetter = 'H';
                    }
                }
            }
        }

        $index = 65 + ((4 - ($hundredkmN % 5)) * 5) + ($hundredkmE % 5);
        if ($index >= 73) { //skip the letter I
            $index++;
        }
        $secondLetter = chr($index);

        return $firstLetter . $secondLetter . substr($easting, 1, 3) . substr($northing, 1, 3);
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

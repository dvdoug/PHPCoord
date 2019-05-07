<?php

declare(strict_types=1);

namespace PHPCoord;

use function floor;
use LengthException;
use function str_pad;
use function strpos;

/**
 * Ordnance Survey grid reference
 * References are accurate to 1m.
 *
 * @author Jonathan Stott
 * @author Doug Wright
 */
class OSRef extends TransverseMercator
{
    private const GRID_LETTERS = 'VWXYZQRSTULMNOPFGHJKABCDE';
    private const GRID_LETTERS_TETRAD = 'AFKQVBGLRWCHMSXDINTYEJPUZ';

    /**
     * @return RefEll
     */
    public function getReferenceEllipsoid(): RefEll
    {
        return RefEll::airy1830();
    }

    /**
     * @return float
     */
    public function getScaleFactor(): float
    {
        return 0.9996012717;
    }

    /**
     * @return int
     */
    public function getOriginNorthing(): int
    {
        return -100000;
    }

    /**
     * @return int
     */
    public function getOriginEasting(): int
    {
        return 400000;
    }

    /**
     * @return float
     */
    public function getOriginLatitude(): float
    {
        return 49;
    }

    /**
     * @return float
     */
    public function getOriginLongitude(): float
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
     * Take a string formatted as a OS grid reference (e.g.
     * "TG514131") and return a reference to an OSRef object that represents
     * that grid reference.
     *
     * @param string $ref
     *
     * @return static
     */
    public static function fromGridReference(string $ref): self
    {
        $tetrad = false;
        if(strlen($ref) === 5) {
            $tetrad = true;
        } elseif (strlen($ref) % 2 !== 0) {
            throw new LengthException('Grid ref must be an even number of characters');
        }

        //first (major) letter is the 500km grid sq, origin at -1000000, -500000
        $majorEasting = strpos(self::GRID_LETTERS, $ref[0]) % 5 * 500000 - 1000000;
        $majorNorthing = (floor(strpos(self::GRID_LETTERS, $ref[0]) / 5)) * 500000 - 500000;

        //second (minor) letter is 100km grid sq, origin at 0,0 of this square
        $minorEasting = strpos(self::GRID_LETTERS, $ref[1]) % 5 * 100000;
        $minorNorthing = (floor(strpos(self::GRID_LETTERS, $ref[1]) / 5)) * 100000;

        //tetrad letter is 2km grid sq. THE GRID HAS A DIFFERENT ORIENTATION - starts bottom left and runs bottom to top. Includes I but no O.
        $tetradEasting = 0;
        $tetradNorthing = 0;
        if ($tetrad) {
            $tetradEasting = strpos(self::GRID_LETTERS_TETRAD, $ref[4]) % 5 * 2000;
            $tetradNorthing = (floor(strpos(self::GRID_LETTERS_TETRAD, $ref[4]) / 5)) * 2000;
        }

        //numbers are a division of that square into smaller and smaller pieces
        if ($tetrad) {
            $numericPortion = substr($ref, 2, 2);
            $numericPortionSize = strlen($numericPortion) / 2;
        } else {
            $numericPortion = substr($ref, 2);
            $numericPortionSize = strlen($numericPortion) / 2;
        }
        $gridSizeInMetres = 1 * (10 ** (5 - $numericPortionSize));

        $easting = $majorEasting + $minorEasting + $tetradEasting + (substr($numericPortion, 0, $numericPortionSize) * $gridSizeInMetres);
        $northing = $majorNorthing + $minorNorthing + $tetradNorthing + (substr($numericPortion, -$numericPortionSize, $numericPortionSize) * $gridSizeInMetres);

        return new static((int) $easting, (int) $northing);
    }

    /**
     * Convert this grid reference into a grid reference string of a
     * given length (2, 5, 4, 6, 8 or 10) including the two-character
     * designation for the 100km square. e.g. TG514131.
     *
     * @param int $length
     *
     * @return string
     */
    public function toGridReference(int $length): string
    {
        $tetrad = false;
        if($length === 5) {
            $tetrad = true;
        } elseif ($length % 2 !== 0) {
            throw new LengthException('Chosen length must be an even number');
        }

        // manually set tetrad half length
        if ($tetrad) {
            $halfLength = 1;
        } else {
            $halfLength = $length / 2;
        }

        $easting = str_pad((string) $this->x, 6, '0', STR_PAD_LEFT);
        $northing = str_pad((string) $this->y, 6, '0', STR_PAD_LEFT);

        $adjustedX = $this->x + 1000000; // Takes us to REAL point of origin.
        $adjustedY = $this->y + 500000; // Takes us to REAL point of origin.
        $majorSquaresEast = floor($adjustedX / 500000); // Divide by 500000 and round down. Base of MAJOR square.
        $majorSquaresNorth = floor($adjustedY / 500000); // Divide by 500000 and round down. Base of MAJOR square.
        $majorLetterIndex = (int) (5 * $majorSquaresNorth + $majorSquaresEast);
        $majorLetter = substr(self::GRID_LETTERS, $majorLetterIndex, 1);

        //second (minor) letter is 100km grid sq, origin at 0,0 of this square - work from the modulus
        $majorSquaresEastModulus = $adjustedX % 500000;
        $majorSquaresNorthModulus = $adjustedY % 500000;
        $minorSquaresEast = floor($majorSquaresEastModulus / 100000);
        $minorSquaresNorth = floor($majorSquaresNorthModulus / 100000);
        $minorLetterIndex = (int) (5 * $minorSquaresNorth + $minorSquaresEast);
        $minorLetter = substr(self::GRID_LETTERS, $minorLetterIndex, 1);

        // tetrad
        $tetradLetter = null;
        if ($tetrad) {
            $minorSquaresEastModulus = $majorSquaresEastModulus % 10000;
            $minorSquaresNorthModulus = $majorSquaresNorthModulus % 10000;
            $tetradSquaresEast = floor($minorSquaresEastModulus / 2000);
            $tetradSquaresNorth = floor($minorSquaresNorthModulus / 2000);
            $tetradLetterIndex = (int) (5 * $tetradSquaresNorth + $tetradSquaresEast);
            $tetradLetter = substr(self::GRID_LETTERS_TETRAD, $tetradLetterIndex, 1);
        }

        return $majorLetter . $minorLetter . substr($easting, 1, $halfLength) . substr($northing, 1, $halfLength) . $tetradLetter;
    }

    /**
     * Convert this grid reference into a latitude and longitude.
     *
     * @return LatLng
     */
    public function toLatLng(): LatLng
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
     *
     * @return string
     */
    public function __toString(): string
    {
        return "({$this->x}, {$this->y})";
    }
}

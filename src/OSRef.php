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
    public static function fromGridReference($ref): self
    {
        if (strlen($ref) % 2 !== 0) {
            throw new LengthException('Grid ref must be an even number of characters');
        }

        //first (major) letter is the 500km grid sq, origin at -1000000, -500000
        $majorEasting = strpos(self::GRID_LETTERS, $ref[0]) % 5 * 500000 - 1000000;
        $majorNorthing = (floor(strpos(self::GRID_LETTERS, $ref[0]) / 5)) * 500000 - 500000;

        //second (minor) letter is 100km grid sq, origin at 0,0 of this square
        $minorEasting = strpos(self::GRID_LETTERS, $ref[1]) % 5 * 100000;
        $minorNorthing = (floor(strpos(self::GRID_LETTERS, $ref[1]) / 5)) * 100000;

        //numbers are a division of that square into smaller and smaller pieces
        $numericPortion = substr($ref, 2);
        $numericPortionSize = strlen($numericPortion) / 2;
        $gridSizeInMetres = 1 * (10 ** (5 - $numericPortionSize));

        $easting = $majorEasting + $minorEasting + (substr($numericPortion, 0, $numericPortionSize) * $gridSizeInMetres);
        $northing = $majorNorthing + $minorNorthing + (substr($numericPortion, -$numericPortionSize, $numericPortionSize) * $gridSizeInMetres);

        return new static((int) $easting, (int) $northing);
    }

    /**
     * Take a string formatted as a six-figure OS grid reference (e.g.
     * "TG514131") and return a reference to an OSRef object that represents
     * that grid reference.
     *
     * @param string $ref
     *
     * @deprecated use fromGridReference() instead, which can take references of other lengths too
     *
     * @return static
     */
    public static function fromSixFigureReference($ref): self
    {
        return static::fromGridReference($ref);
    }

    /**
     * Convert this grid reference into a grid reference string of a
     * given length (2, 4, 6, 8 or 10) including the two-character
     * designation for the 100km square. e.g. TG514131.
     *
     * @param int $length
     *
     * @return string
     */
    public function toGridReference(int $length): string
    {
        if ($length % 2 !== 0) {
            throw new LengthException('Chosen length must be an even number');
        }

        $halfLength = $length / 2;

        $easting = str_pad((string) $this->x, 6, '0', STR_PAD_LEFT);
        $northing = str_pad((string) $this->y, 6, '0', STR_PAD_LEFT);

        $adjustedX = $this->x + 1000000;
        $adjustedY = $this->y + 500000;
        $majorSquaresEast = floor($adjustedX / 500000);
        $majorSquaresNorth = floor($adjustedY / 500000);
        $majorLetterIndex = (int) (5 * $majorSquaresNorth + $majorSquaresEast);
        $majorLetter = substr(self::GRID_LETTERS, $majorLetterIndex, 1);

        //second (minor) letter is 100km grid sq, origin at 0,0 of this square
        $minorSquaresEast = $easting[0] % 5;
        $minorSquaresNorth = $northing[0] % 5;
        $minorLetterIndex = (5 * $minorSquaresNorth + $minorSquaresEast);
        $minorLetter = substr(self::GRID_LETTERS, $minorLetterIndex, 1);

        return $majorLetter . $minorLetter . substr($easting, 1, $halfLength) . substr($northing, 1, $halfLength);
    }

    /**
     * Convert this grid reference into a string using a standard two-figure
     * grid reference including the two-character designation for the 100km
     * square. e.g. TG51 (10km square).
     *
     * @deprecated use toGridReference() instead, which can produces references of varying precision
     *
     * @return string
     */
    public function toTwoFigureReference(): string
    {
        return $this->toGridReference(2);
    }

    /**
     * Convert this grid reference into a string using a standard four-figure
     * grid reference including the two-character designation for the 100km
     * square. e.g. TG5113 (1km square).
     *
     * @deprecated use toGridReference() instead, which can produces references of varying precision
     *
     * @return string
     */
    public function toFourFigureReference(): string
    {
        return $this->toGridReference(4);
    }

    /**
     * Convert this grid reference into a string using a standard six-figure
     * grid reference including the two-character designation for the 100km
     * square. e.g. TG514131 (100m square).
     *
     * @deprecated use toGridReference() instead, which can produces references of varying precision
     *
     * @return string
     */
    public function toSixFigureReference(): string
    {
        return $this->toGridReference(6);
    }

    /**
     * Convert this grid reference into a string using a standard eight-figure
     * grid reference including the two-character designation for the 100km
     * square. e.g. TG51431312 (10m square).
     *
     * @deprecated use toGridReference() instead, which can produces references of varying precision
     *
     * @return string
     */
    public function toEightFigureReference(): string
    {
        return $this->toGridReference(8);
    }

    /**
     * Convert this grid reference into a string using a standard ten-figure
     * grid reference including the two-character designation for the 100km
     * square. e.g. TG5143113121 (1m square).
     *
     * @deprecated use toGridReference() instead, which can produces references of varying precision
     *
     * @return string
     */
    public function toTenFigureReference(): string
    {
        return $this->toGridReference(10);
    }

    /**
     * Convert this grid reference into a latitude and longitude.
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
     * @return string
     */
    public function __toString(): string
    {
        return "({$this->x}, {$this->y})";
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use DateTimeInterface;
use function floor;
use function implode;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\Exception\InvalidCoordinateException;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use function str_pad;
use const STR_PAD_LEFT;
use function str_replace;
use function strlen;
use function strpos;
use function substr;

class BritishNationalGridPoint extends ProjectedPoint
{
    private const GRID_LETTERS = 'VWXYZQRSTULMNOPFGHJKABCDE';

    public function __construct(Length $easting, Length $northing, ?DateTimeInterface $epoch = null)
    {
        parent::__construct($easting, $northing, null, null, Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID), $epoch);
    }

    /**
     * @param string $reference OS grid reference (e.g. "TG514131")
     */
    public static function fromGridReference(string $reference, ?DateTimeInterface $epoch = null): self
    {
        $reference = str_replace(' ', '', $reference);

        if (strlen($reference) % 2 !== 0) {
            throw new InvalidCoordinateException('Grid ref must be an even number of characters');
        }

        //first (major) letter is the 500km grid sq, origin at -1000000, -500000
        $majorEasting = strpos(static::GRID_LETTERS, $reference[0]) % 5 * 500000 - 1000000;
        $majorNorthing = (floor(strpos(static::GRID_LETTERS, $reference[0]) / 5)) * 500000 - 500000;

        //second (minor) letter is 100km grid sq, origin at 0,0 of this square
        $minorEasting = strpos(static::GRID_LETTERS, $reference[1]) % 5 * 100000;
        $minorNorthing = (floor(strpos(static::GRID_LETTERS, $reference[1]) / 5)) * 100000;

        //numbers are a division of that square into smaller and smaller pieces
        $numericPortion = substr($reference, 2);
        $numericPortionSize = strlen($numericPortion) / 2;
        $gridSizeInMetres = 1 * (10 ** (5 - $numericPortionSize));

        $easting = $majorEasting + $minorEasting + (substr($numericPortion, 0, $numericPortionSize) * $gridSizeInMetres);
        $northing = $majorNorthing + $minorNorthing + (substr($numericPortion, -$numericPortionSize, $numericPortionSize) * $gridSizeInMetres);

        return new static(new Metre($easting), new Metre($northing), $epoch);
    }

    /**
     * Grid reference without spaces. e.g. TG514131.
     */
    public function asGridReference(int $length): string
    {
        return implode('', $this->gridReference($length));
    }

    /**
     * Grid reference with spaces. e.g. TG 514 131.
     */
    public function asGridReferenceWithSpaces(int $length): string
    {
        return implode(' ', $this->gridReference($length));
    }

    /**
     * Convert this grid reference into a grid reference string of a
     * given length (2, 4, 6, 8 or 10) including the two-character
     * designation for the 100km square. e.g. TG514131.
     *
     * @return string
     */
    protected function gridReference(int $length): array
    {
        if ($length % 2 !== 0) {
            throw new InvalidCoordinateException('Chosen length must be an even number');
        }

        $halfLength = $length / 2;

        $x = $this->easting->asMetres()->getValue();
        $y = $this->northing->asMetres()->getValue();
        $easting = str_pad((string) $x, 6, '0', STR_PAD_LEFT);
        $northing = str_pad((string) $y, 6, '0', STR_PAD_LEFT);

        $adjustedX = $x + 1000000;
        $adjustedY = $y + 500000;
        $majorSquaresEast = floor($adjustedX / 500000);
        $majorSquaresNorth = floor($adjustedY / 500000);
        $majorLetterIndex = (int) (5 * $majorSquaresNorth + $majorSquaresEast);
        $majorLetter = substr(self::GRID_LETTERS, $majorLetterIndex, 1);

        //second (minor) letter is 100km grid sq, origin at 0,0 of this square
        $minorSquaresEast = $easting[0] % 5;
        $minorSquaresNorth = $northing[0] % 5;
        $minorLetterIndex = (5 * $minorSquaresNorth + $minorSquaresEast);
        $minorLetter = substr(self::GRID_LETTERS, $minorLetterIndex, 1);

        return [
            $majorLetter . $minorLetter,
            substr($easting, 1, $halfLength),
            substr($northing, 1, $halfLength),
        ];
    }
}

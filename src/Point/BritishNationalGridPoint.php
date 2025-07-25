<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use DateTimeInterface;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\Exception\InvalidCoordinateException;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;

use function floor;
use function implode;
use function str_pad;
use function str_replace;
use function strlen;
use function strpos;
use function substr;

use const STR_PAD_LEFT;

class BritishNationalGridPoint extends ProjectedPoint
{
    private const GRID_LETTERS = 'VWXYZQRSTULMNOPFGHJKABCDE';

    public function __construct(Length $easting, Length $northing, ?DateTimeInterface $epoch = null, ?Length $accuracy = null)
    {
        parent::__construct(Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID), $easting, $northing, null, null, $epoch, null, $accuracy);
    }

    /**
     * @param string $reference OS grid reference (e.g. "TG514131")
     */
    public static function fromGridReference(string $reference, ?DateTimeInterface $epoch = null, ?Length $accuracy = null): self
    {
        $reference = str_replace(' ', '', $reference);

        if (strlen($reference) % 2 !== 0) {
            throw new InvalidCoordinateException('Grid ref must be an even number of characters');
        }

        // first (major) letter is the 500km grid sq, origin at -1000000, -500000
        $majorEasting = strpos(self::GRID_LETTERS, $reference[0]) % 5 * 500000 - 1000000;
        $majorNorthing = floor(strpos(self::GRID_LETTERS, $reference[0]) / 5) * 500000 - 500000;

        // second (minor) letter is 100km grid sq, origin at 0,0 of this square
        $minorEasting = strpos(self::GRID_LETTERS, $reference[1]) % 5 * 100000;
        $minorNorthing = floor(strpos(self::GRID_LETTERS, $reference[1]) / 5) * 100000;

        // numbers are a division of that square into smaller and smaller pieces
        $numericPortion = substr($reference, 2);
        $numericPortionSize = strlen($numericPortion) / 2;
        $gridSizeInMetres = 1 * (10 ** (5 - $numericPortionSize));

        $easting = $majorEasting + $minorEasting + ((int) substr($numericPortion, 0, (int) $numericPortionSize) * $gridSizeInMetres);
        $northing = $majorNorthing + $minorNorthing + ((int) substr($numericPortion, -(int) $numericPortionSize, (int) $numericPortionSize) * $gridSizeInMetres);

        return new self(new Metre($easting), new Metre($northing), $epoch, $accuracy);
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
     * @return array{0: string, 1: string, 2: string}
     */
    protected function gridReference(int $length): array
    {
        if ($length % 2 !== 0) {
            throw new InvalidCoordinateException('Chosen length must be an even number');
        }

        if ($length > 10) {
            throw new InvalidCoordinateException('Grid squares are 100,000m wide, max precision is 10');
        }

        $halfLength = $length / 2;

        $x = $this->easting->asMetres()->getValue();
        $y = $this->northing->asMetres()->getValue();
        $easting = str_pad((string) (int) $x, $halfLength + 1, '0', STR_PAD_LEFT);
        $northing = str_pad((string) (int) $y, $halfLength + 1, '0', STR_PAD_LEFT);

        $adjustedX = $x + 1000000;
        $adjustedY = $y + 500000;
        $majorSquaresEast = floor($adjustedX / 500000);
        $majorSquaresNorth = floor($adjustedY / 500000);
        $majorLetterIndex = (int) (5 * $majorSquaresNorth + $majorSquaresEast);
        $majorLetter = substr(self::GRID_LETTERS, $majorLetterIndex, 1);

        // second (minor) letter is 100km grid sq, origin at 0,0 of this square
        $minorSquaresEast = (int) $easting[0] % 5;
        $minorSquaresNorth = (int) $northing[0] % 5;
        $minorLetterIndex = (5 * $minorSquaresNorth + $minorSquaresEast);
        $minorLetter = substr(self::GRID_LETTERS, $minorLetterIndex, 1);

        return [
            $majorLetter . $minorLetter,
            substr($easting, 1, $halfLength),
            substr($northing, 1, $halfLength),
        ];
    }
}

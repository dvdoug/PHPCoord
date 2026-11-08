<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use DateTimeInterface;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\Datum\Datum;
use PHPCoord\Exception\InvalidCoordinateException;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;

use function array_key_exists;
use function floor;
use function implode;
use function preg_match;
use function str_pad;
use function str_replace;
use function strlen;
use function strpos;
use function strtoupper;
use function substr;
use function trim;

use const STR_PAD_LEFT;

class NorthAmericanGeographicPoint extends GeographicPoint
{
    private const BANDS = 'CDEFGHJKLMNPQRSTUVWX';

    private const COLUMNS = 'ABCDEFGHJKLMNPQRSTUVWXYZ';

    private const ROWS = 'ABCDEFGHJKLMNPQRSTUV';

    /**
     * North American datums whose latitude and longitude can be written as a US National Grid reference.
     * A null suffix is the unlabelled NAD83 form. Any other datum is named on the reference.
     *
     * @var array<string, string|null>
     */
    private const DATUMS = [
        Datum::EPSG_NORTH_AMERICAN_DATUM_1927 => 'NAD 27',
        // NAD27(76) and NAD27(CGQ77) are not the FGDC "(NAD 27)" datum.
        Datum::EPSG_NORTH_AMERICAN_DATUM_1927_1976 => null,
        Datum::EPSG_NORTH_AMERICAN_DATUM_1927_CGQ77 => null,
        Datum::EPSG_NORTH_AMERICAN_DATUM_1983 => null,
        Datum::EPSG_NAD83_HIGH_ACCURACY_REFERENCE_NETWORK => null,
        Datum::EPSG_NAD83_HIGH_ACCURACY_REFERENCE_NETWORK_CORRECTED => null,
        Datum::EPSG_NAD83_FEDERAL_BASE_NETWORK => null,
        Datum::EPSG_NAD83_CONTINUOUSLY_OPERATING_REFERENCE_STATION_1996 => null,
        Datum::EPSG_NAD83_NATIONAL_SPATIAL_REFERENCE_SYSTEM_2007 => null,
        Datum::EPSG_NAD83_NATIONAL_SPATIAL_REFERENCE_SYSTEM_2011 => null,
        Datum::EPSG_NAD83_NATIONAL_SPATIAL_REFERENCE_SYSTEM_PA11 => null,
        Datum::EPSG_NAD83_NATIONAL_SPATIAL_REFERENCE_SYSTEM_MA11 => null,
        Datum::EPSG_NAD83_CANADIAN_SPATIAL_REFERENCE_SYSTEM => null,
        Datum::EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS96 => null,
        Datum::EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_2 => null,
        Datum::EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_3 => null,
        Datum::EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_4 => null,
        Datum::EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_5 => null,
        Datum::EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_6 => null,
        Datum::EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_7 => null,
        Datum::EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_8 => null,
        Datum::EPSG_NORTH_AMERICAN_TERRESTRIAL_REFERENCE_FRAME_OF_2022_EPOCH_2020_00 => 'NATRF2022',
        Datum::EPSG_CARIBBEAN_TERRESTRIAL_REFERENCE_FRAME_OF_2022_EPOCH_2020_00 => 'CATRF2022',
        Datum::EPSG_PACIFIC_TERRESTRIAL_REFERENCE_FRAME_OF_2022_EPOCH_2020_00 => 'PATRF2022',
        Datum::EPSG_MARIANA_TERRESTRIAL_REFERENCE_FRAME_OF_2022_EPOCH_2020_00 => 'MATRF2022',
    ];

    /**
     * NAD83(2011) does not cover Hawaii, American Samoa or Guam; those are NAD83(PA11) and NAD83(MA11).
     * NAD83(CORS96) and NAD83(NSRS2007) share the NAD83(2011) area. NAD83 and NATRF2022 are not listed:
     * both include Canada.
     *
     * @var list<string>
     */
    private const US_NATIONAL_GRID_AREAS = [
        Geographic2D::EPSG_NAD83_2011,
        Geographic2D::EPSG_NAD83_PA11,
        Geographic2D::EPSG_NAD83_MA11,
    ];

    /**
     * @var array<string, string>
     */
    private const SUFFIX_CRS = [
        'NAD 27' => Geographic2D::EPSG_NAD27,
        'NATRF2022' => Geographic2D::EPSG_NATRF2022E2020,
        'CATRF2022' => Geographic2D::EPSG_CATRF2022E2020,
        'PATRF2022' => Geographic2D::EPSG_PATRF2022E2020,
        'MATRF2022' => Geographic2D::EPSG_MATRF2022E2020,
    ];

    public static function usesDatum(Datum $datum): bool
    {
        return array_key_exists($datum->getSRID(), self::DATUMS);
    }

    /**
     * @param string $reference US National Grid reference (e.g. "18S UJ 2348 0647")
     */
    public static function fromUSNG(string $reference, ?DateTimeInterface $epoch = null, ?Length $accuracy = null, ?Geographic2D $crs = null): self
    {
        [$zone, $band, $square, $digits, $suffix] = self::parseUSNG($reference);
        $crs = self::crsForReference($suffix, $crs);

        $column = strpos(self::COLUMNS, $square[0]);
        $columnOrigin = (($zone - 1) % 3) * 8;
        if ($column === false || $column < $columnOrigin || $column >= $columnOrigin + 8) {
            throw new InvalidCoordinateException('Invalid US National Grid reference');
        }

        $row = strpos(self::ROWS, $square[1]);
        $bandIndex = strpos(self::BANDS, $band);
        if ($row === false || $bandIndex === false) {
            throw new InvalidCoordinateException('Invalid US National Grid reference');
        }
        if ($zone % 2 === 0) {
            $row = self::modulo($row - 5, 20);
        }

        $northingRow = self::utmRow($bandIndex - 10, $column - $columnOrigin, $row);
        if ($northingRow === null) {
            throw new InvalidCoordinateException('Invalid US National Grid reference');
        }

        $precision = (int) (strlen($digits) / 2);
        $cell = 10 ** (5 - $precision);
        $eastingDigits = $precision === 0 ? 0 : (int) substr($digits, 0, $precision);
        $northingDigits = $precision === 0 ? 0 : (int) substr($digits, $precision);
        $easting = ($column - $columnOrigin + 1) * 100000 + $eastingDigits * $cell;
        $northingTile = $northingRow + ($bandIndex >= 10 ? 0 : 100);
        $northing = $northingTile * 100000 + $northingDigits * $cell;

        $utm = new UTMPoint($crs, new Metre($easting), new Metre($northing), $zone, $bandIndex >= 10 ? UTMPoint::HEMISPHERE_NORTH : UTMPoint::HEMISPHERE_SOUTH, $epoch, $accuracy);
        $geographic = $utm->asGeographicPoint();
        if (!$geographic instanceof self) {
            throw new InvalidCoordinateReferenceSystemException('A US National Grid reference requires a North American datum');
        }
        $geographic->accuracy = $accuracy;
        $geographic->checkWithinUsNationalGrid();

        return $geographic;
    }

    public function asUSNG(int $digits = 10): string
    {
        return $this->withDatumSuffix(implode('', $this->usng($digits)));
    }

    public function asUSNGWithSpaces(int $digits = 10): string
    {
        return $this->withDatumSuffix(implode(' ', $this->usng($digits)));
    }

    /**
     * @return array{0: string, 1: string, 2?: string, 3?: string}
     */
    private function usng(int $digits): array
    {
        if ($digits < 0 || $digits > 10 || $digits % 2 !== 0) {
            throw new InvalidCoordinateException('USNG precision must be an even number from 0 to 10');
        }

        $latitude = $this->getLatitude()->asDegrees()->getValue();
        if ($latitude < -80 || $latitude >= 84) {
            throw new InvalidCoordinateException('US National Grid is only defined between 80°S and 84°N');
        }

        $this->checkWithinUsNationalGrid();

        $utm = $this->asUTMPoint();
        $zone = $utm->getZone();
        $easting = self::stableMetres($utm->getEasting()->asMetres()->getValue());
        $northing = self::stableMetres($utm->getNorthing()->asMetres()->getValue());
        if ($utm->getHemisphere() === UTMPoint::HEMISPHERE_SOUTH) {
            $northing -= 10000000;
        }

        $eastingTile = (int) floor($easting / 100000);
        if ($eastingTile < 1 || $eastingTile > 8) {
            throw new InvalidCoordinateException('US National Grid is only defined for eastings from 100km to 900km');
        }

        $bandIndex = (int) floor(($latitude + 80) / 8);
        if ($bandIndex > 19) {
            $bandIndex = 19;
        }

        $precision = (int) ($digits / 2);
        $square = self::COLUMNS[(($zone - 1) % 3) * 8 + $eastingTile - 1] . self::ROWS[self::modulo((int) floor($northing / 100000) + (($zone - 1) % 2) * 5, 20)];
        $parts = [
            $zone . self::BANDS[$bandIndex],
            $square,
        ];
        if ($precision > 0) {
            $parts[] = self::withinSquare($easting, $precision);
            $parts[] = self::withinSquare($northing, $precision);
        }

        return $parts;
    }

    private function checkWithinUsNationalGrid(): void
    {
        $value = $this->asGeographicValue();
        foreach (self::US_NATIONAL_GRID_AREAS as $srid) {
            if (Geographic2D::fromSRID($srid)->getBoundingArea()->containsPoint($value)) {
                return;
            }
        }

        throw new InvalidCoordinateException('US National Grid is only defined within the area of the US NAD83 realisations');
    }

    private function withDatumSuffix(string $reference): string
    {
        $datum = $this->getCRS()->getDatum()->getSRID();
        if (!array_key_exists($datum, self::DATUMS) || self::DATUMS[$datum] === null) {
            return $reference;
        }

        $suffix = self::DATUMS[$datum];

        return $reference . ' (' . $suffix . ')';
    }

    /**
     * The 100km row letters repeat every 2,000km. The latitude band selects which repeat,
     * including the two rows whose northing crosses a band boundary.
     */
    private static function utmRow(int $band, int $column, int $row): ?int
    {
        $centre = 100 * (8 * $band + 4) / 90;
        $northern = $band >= 0;
        $minRow = $band > -10 ? (int) floor($centre - 4.3 - ($northern ? 0.1 : 0.0)) : -90;
        $maxRow = $band < 9 ? (int) floor($centre + 4.4 - ($northern ? 0.1 : 0.0)) : 94;
        $baseRow = (int) floor(($minRow + $maxRow) / 2) - 10;
        $row = self::modulo($row - $baseRow, 20) + $baseRow;

        if ($row >= $minRow && $row <= $maxRow) {
            return $row;
        }

        $foldedBand = $band >= 0 ? $band : -$band - 1;
        $foldedRow = $row >= 0 ? $row : -$row - 1;
        $foldedColumn = $column < 4 ? $column : -$column + 7;
        $onBoundary = ($foldedRow === 70 && $foldedBand === 8 && $foldedColumn >= 2)
            || ($foldedRow === 71 && $foldedBand === 7 && $foldedColumn <= 2)
            || ($foldedRow === 79 && $foldedBand === 9 && $foldedColumn >= 1)
            || ($foldedRow === 80 && $foldedBand === 8 && $foldedColumn <= 1);

        return $onBoundary ? $row : null;
    }

    /**
     * @return array{0: int, 1: string, 2: string, 3: string, 4: string|null}
     */
    private static function parseUSNG(string $reference): array
    {
        $reference = strtoupper(trim($reference));
        $suffix = null;
        if (preg_match('/\(([A-Z0-9 ]+)\)\s*$/', $reference, $suffixMatch) === 1) {
            $suffix = $suffixMatch[1];
            if (!isset(self::SUFFIX_CRS[$suffix])) {
                throw new InvalidCoordinateException('Invalid US National Grid reference');
            }
            $reference = trim(substr($reference, 0, -strlen($suffixMatch[0])));
        }

        $reference = str_replace(' ', '', $reference);
        if (preg_match('/^(\d{1,2})([C-HJ-NP-X])([A-HJ-NP-Z]{2})(\d*)$/', $reference, $match) !== 1) {
            throw new InvalidCoordinateException('Invalid US National Grid reference');
        }

        $zone = (int) $match[1];
        $digits = $match[4];
        if ($zone < 1 || $zone > 60 || strlen($digits) > 10 || strlen($digits) % 2 !== 0) {
            throw new InvalidCoordinateException('Invalid US National Grid reference');
        }

        return [$zone, $match[2], $match[3], $digits, $suffix];
    }

    private static function crsForReference(?string $suffix, ?Geographic2D $crs): Geographic2D
    {
        if ($suffix !== null) {
            $suffixCrs = Geographic2D::fromSRID(self::SUFFIX_CRS[$suffix]);
            if ($crs !== null && $crs->getDatum()->getSRID() !== $suffixCrs->getDatum()->getSRID()) {
                throw new InvalidCoordinateException('USNG datum does not match the supplied coordinate reference system');
            }

            return $crs ?? $suffixCrs;
        }

        $crs ??= Geographic2D::fromSRID(Geographic2D::EPSG_NAD83_2011);
        if (!self::usesDatum($crs->getDatum())) {
            throw new InvalidCoordinateReferenceSystemException('A US National Grid reference requires a North American datum');
        }

        return $crs;
    }

    private static function withinSquare(float $metres, int $precision): string
    {
        $tile = (int) floor($metres / 100000);
        $remainder = $metres - ($tile * 100000);
        $digits = (int) floor($remainder / (10 ** (5 - $precision)));

        return str_pad((string) $digits, $precision, '0', STR_PAD_LEFT);
    }

    private static function stableMetres(float $metres): float
    {
        return floor($metres * 1000000 + 0.5) / 1000000;
    }

    private static function modulo(int $value, int $divisor): int
    {
        $remainder = $value % $divisor;

        return $remainder < 0 ? $remainder + $divisor : $remainder;
    }
}

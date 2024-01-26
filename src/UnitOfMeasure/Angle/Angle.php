<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;

use function array_map;

use const M_PI;

abstract class Angle implements UnitOfMeasure
{
    /**
     * Arc-second
     * 1/60th arc-minute = ((pi/180) / 3600) radians.
     */
    public const EPSG_ARC_SECOND = 'urn:ogc:def:uom:EPSG::9104';

    /**
     * Centesimal second
     * 1/100 of a centesimal minute or 1/10,000th of a grad and gon = ((pi/200) / 10000) radians.
     */
    public const EPSG_CENTESIMAL_SECOND = 'urn:ogc:def:uom:EPSG::9113';

    /**
     * Degree
     * = pi/180 radians.
     */
    public const EPSG_DEGREE = 'urn:ogc:def:uom:EPSG::9102';

    /**
     * Degree hemisphere
     * Degree representation. Format: degrees (real, any precision) - hemisphere abbreviation (single character N S E
     * or W). Convert to degrees using algorithm.
     */
    public const EPSG_DEGREE_HEMISPHERE = 'urn:ogc:def:uom:EPSG::9116';

    /**
     * Degree minute
     * Degree representation. Format: signed degrees (integer)  - arc-minutes (real, any precision). Different symbol
     * sets are in use as field separators, for example º '. Convert to degrees using algorithm.
     */
    public const EPSG_DEGREE_MINUTE = 'urn:ogc:def:uom:EPSG::9115';

    /**
     * Degree minute hemisphere
     * Degree representation. Format: degrees (integer) - arc-minutes (real, any precision) - hemisphere abbreviation
     * (single character N S E or W). Different symbol sets are in use as field separators, for example º '. Convert
     * to degrees using algorithm.
     */
    public const EPSG_DEGREE_MINUTE_HEMISPHERE = 'urn:ogc:def:uom:EPSG::9118';

    /**
     * Degree minute second
     * Degree representation. Format: signed degrees (integer) - arc-minutes (integer) - arc-seconds (real, any
     * precision). Different symbol sets are in use as field separators, for example º ' ". Convert to degrees using
     * algorithm.
     */
    public const EPSG_DEGREE_MINUTE_SECOND = 'urn:ogc:def:uom:EPSG::9107';

    /**
     * Degree minute second hemisphere
     * Degree representation. Format: degrees (integer) - arc-minutes (integer) - arc-seconds (real) - hemisphere
     * abbreviation (single character N S E or W). Different symbol sets are in use as field separators for example º
     * ' ". Convert to deg using algorithm.
     */
    public const EPSG_DEGREE_MINUTE_SECOND_HEMISPHERE = 'urn:ogc:def:uom:EPSG::9108';

    /**
     * Grad
     * =pi/200 radians.
     */
    public const EPSG_GRAD = 'urn:ogc:def:uom:EPSG::9105';

    /**
     * Hemisphere degree
     * Degree representation. Format: hemisphere abbreviation (single character N S E or W) - degrees (real, any
     * precision). Convert to degrees using algorithm.
     */
    public const EPSG_HEMISPHERE_DEGREE = 'urn:ogc:def:uom:EPSG::9117';

    /**
     * Hemisphere degree minute
     * Degree representation. Format:  hemisphere abbreviation (single character N S E or W) - degrees (integer) -
     * arc-minutes (real, any precision). Different symbol sets are in use as field separators, for example º '.
     * Convert to degrees using algorithm.
     */
    public const EPSG_HEMISPHERE_DEGREE_MINUTE = 'urn:ogc:def:uom:EPSG::9119';

    /**
     * Hemisphere degree minute second
     * Degree representation. Format: hemisphere abbreviation (single character N S E or W) - degrees (integer) -
     * arc-minutes (integer) - arc-seconds (real). Different symbol sets are in use as field separators for example º
     * ' ". Convert to deg using algorithm.
     */
    public const EPSG_HEMISPHERE_DEGREE_MINUTE_SECOND = 'urn:ogc:def:uom:EPSG::9120';

    /**
     * Microradian
     * rad * 10E-6.
     */
    public const EPSG_MICRORADIAN = 'urn:ogc:def:uom:EPSG::9109';

    /**
     * Milliarc-second
     * = ((pi/180) / 3600 / 1000) radians.
     */
    public const EPSG_MILLIARC_SECOND = 'urn:ogc:def:uom:EPSG::1031';

    /**
     * Radian
     * SI coherent derived unit (standard unit) for plane angle.
     */
    public const EPSG_RADIAN = 'urn:ogc:def:uom:EPSG::9101';

    /**
     * Sexagesimal DMS
     * Pseudo unit. Format: signed degrees - period - minutes (2 digits) - integer seconds (2 digits) - fraction of
     * seconds (any precision). Must include leading zero in minutes and seconds and exclude decimal point for seconds.
     * Convert to deg using algorithm.
     */
    public const EPSG_SEXAGESIMAL_DMS = 'urn:ogc:def:uom:EPSG::9110';

    /**
     * @var array<string, array{name: string, fqcn?: class-string<self>, help: string}>
     */
    protected static array $sridData = [
        'urn:ogc:def:uom:EPSG::1031' => [
            'name' => 'milliarc-second',
            'help' => '= ((pi/180) / 3600 / 1000) radians',
        ],
        'urn:ogc:def:uom:EPSG::9101' => [
            'name' => 'radian',
            'help' => 'SI coherent derived unit (standard unit) for plane angle.',
        ],
        'urn:ogc:def:uom:EPSG::9102' => [
            'name' => 'degree',
            'help' => '= pi/180 radians',
        ],
        'urn:ogc:def:uom:EPSG::9104' => [
            'name' => 'arc-second',
            'help' => '1/60th arc-minute = ((pi/180) / 3600) radians',
        ],
        'urn:ogc:def:uom:EPSG::9105' => [
            'name' => 'grad',
            'help' => '=pi/200 radians.',
        ],
        'urn:ogc:def:uom:EPSG::9107' => [
            'name' => 'degree minute second',
            'help' => 'Degree representation. Format: signed degrees (integer) - arc-minutes (integer) - arc-seconds (real, any precision). Different symbol sets are in use as field separators, for example º \' ". Convert to degrees using algorithm.',
        ],
        'urn:ogc:def:uom:EPSG::9108' => [
            'name' => 'degree minute second hemisphere',
            'help' => 'Degree representation. Format: degrees (integer) - arc-minutes (integer) - arc-seconds (real) - hemisphere abbreviation (single character N S E or W). Different symbol sets are in use as field separators for example º \' ". Convert to deg using algorithm.',
        ],
        'urn:ogc:def:uom:EPSG::9109' => [
            'name' => 'microradian',
            'help' => 'rad * 10E-6',
        ],
        'urn:ogc:def:uom:EPSG::9110' => [
            'name' => 'sexagesimal DMS',
            'help' => 'Pseudo unit. Format: signed degrees - period - minutes (2 digits) - integer seconds (2 digits) - fraction of seconds (any precision). Must include leading zero in minutes and seconds and exclude decimal point for seconds. Convert to deg using algorithm.',
        ],
        'urn:ogc:def:uom:EPSG::9113' => [
            'name' => 'centesimal second',
            'help' => '1/100 of a centesimal minute or 1/10,000th of a grad and gon = ((pi/200) / 10000) radians',
        ],
        'urn:ogc:def:uom:EPSG::9115' => [
            'name' => 'degree minute',
            'help' => 'Degree representation. Format: signed degrees (integer)  - arc-minutes (real, any precision). Different symbol sets are in use as field separators, for example º \'. Convert to degrees using algorithm.',
        ],
        'urn:ogc:def:uom:EPSG::9116' => [
            'name' => 'degree hemisphere',
            'help' => 'Degree representation. Format: degrees (real, any precision) - hemisphere abbreviation (single character N S E or W). Convert to degrees using algorithm.',
        ],
        'urn:ogc:def:uom:EPSG::9117' => [
            'name' => 'hemisphere degree',
            'help' => 'Degree representation. Format: hemisphere abbreviation (single character N S E or W) - degrees (real, any precision). Convert to degrees using algorithm.',
        ],
        'urn:ogc:def:uom:EPSG::9118' => [
            'name' => 'degree minute hemisphere',
            'help' => 'Degree representation. Format: degrees (integer) - arc-minutes (real, any precision) - hemisphere abbreviation (single character N S E or W). Different symbol sets are in use as field separators, for example º \'. Convert to degrees using algorithm.',
        ],
        'urn:ogc:def:uom:EPSG::9119' => [
            'name' => 'hemisphere degree minute',
            'help' => 'Degree representation. Format:  hemisphere abbreviation (single character N S E or W) - degrees (integer) - arc-minutes (real, any precision). Different symbol sets are in use as field separators, for example º \'. Convert to degrees using algorithm.',
        ],
        'urn:ogc:def:uom:EPSG::9120' => [
            'name' => 'hemisphere degree minute second',
            'help' => 'Degree representation. Format: hemisphere abbreviation (single character N S E or W) - degrees (integer) - arc-minutes (integer) - arc-seconds (real). Different symbol sets are in use as field separators for example º \' ". Convert to deg using algorithm.',
        ],
    ];

    abstract public function __construct(float $angle);

    abstract public function asRadians(): Radian;

    public function asDegrees(): Degree
    {
        return new Degree($this->asRadians()->getValue() * 180 / M_PI);
    }

    public function add(self $unit): self
    {
        if (get_class($this) === get_class($unit)) {
            return new static($this->getValue() + $unit->getValue());
        }
        $resultAsRadians = new Radian($this->asRadians()->getValue() + $unit->asRadians()->getValue());
        $conversionRatio = (new static(1))->asRadians()->getValue();

        return new static($resultAsRadians->getValue() / $conversionRatio);
    }

    public function subtract(self $unit): self
    {
        if (get_class($this) === get_class($unit)) {
            return new static($this->getValue() - $unit->getValue());
        }
        $resultAsRadians = new Radian($this->asRadians()->getValue() - $unit->asRadians()->getValue());
        $conversionRatio = (new static(1))->asRadians()->getValue();

        return new static($resultAsRadians->getValue() / $conversionRatio);
    }

    public function multiply(float $multiplicand): self
    {
        return new static($this->getValue() * $multiplicand);
    }

    public function divide(float $divisor): self
    {
        return new static($this->getValue() / $divisor);
    }

    /**
     * @param float|string $measurement
     */
    public static function makeUnit($measurement, string $srid): self
    {
        switch ($srid) {
            case self::EPSG_RADIAN:
                return new Radian($measurement);
            case self::EPSG_MICRORADIAN:
                return new Radian($measurement / 1000000);
            case self::EPSG_DEGREE:
                return new Degree($measurement);
            case self::EPSG_ARC_SECOND:
                return new ArcSecond($measurement);
            case self::EPSG_MILLIARC_SECOND:
                return new ArcSecond($measurement / 1000);
            case self::EPSG_GRAD:
                return new Grad($measurement);
            case self::EPSG_CENTESIMAL_SECOND:
                return new Radian($measurement * M_PI / 2000000);
            case self::EPSG_DEGREE_MINUTE_SECOND:
                return Degree::fromDegreeMinuteSecond((string) $measurement);
            case self::EPSG_DEGREE_MINUTE_SECOND_HEMISPHERE:
                return Degree::fromDegreeMinuteSecondHemisphere((string) $measurement);
            case self::EPSG_HEMISPHERE_DEGREE_MINUTE_SECOND:
                return Degree::fromHemisphereDegreeMinuteSecond((string) $measurement);
            case self::EPSG_DEGREE_MINUTE:
                return Degree::fromDegreeMinute((string) $measurement);
            case self::EPSG_DEGREE_MINUTE_HEMISPHERE:
                return Degree::fromDegreeMinuteHemisphere((string) $measurement);
            case self::EPSG_HEMISPHERE_DEGREE_MINUTE:
                return Degree::fromHemisphereDegreeMinute((string) $measurement);
            case self::EPSG_DEGREE_HEMISPHERE:
                return Degree::fromDegreeHemisphere((string) $measurement);
            case self::EPSG_HEMISPHERE_DEGREE:
                return Degree::fromHemisphereDegree((string) $measurement);
            case self::EPSG_SEXAGESIMAL_DMS:
                return Degree::fromSexagesimalDMS((string) $measurement);
        }

        throw new UnknownUnitOfMeasureException($srid);
    }

    public static function convert(self $angle, string $targetSRID): self
    {
        $conversionRatio = static::makeUnit(1, $targetSRID)->asRadians()->getValue();

        return self::makeUnit($angle->asRadians()->getValue() / $conversionRatio, $targetSRID);
    }

    /**
     * @return array<string, string>
     */
    public static function getSupportedSRIDs(): array
    {
        return array_map(fn ($supportedSrid) => $supportedSrid['name'], self::$sridData);
    }

    /**
     * @return array<string, array{name: string, help: string}>
     */
    public static function getSupportedSRIDsWithHelp(): array
    {
        return array_map(fn (array $data) => [
            'name' => $data['name'],
            'help' => $data['help'],
        ], static::$sridData);
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}

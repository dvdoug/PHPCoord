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

    protected static array $sridData = [
        'urn:ogc:def:uom:EPSG::1031' => [
            'name' => 'milliarc-second',
        ],
        'urn:ogc:def:uom:EPSG::9101' => [
            'name' => 'radian',
        ],
        'urn:ogc:def:uom:EPSG::9102' => [
            'name' => 'degree',
        ],
        'urn:ogc:def:uom:EPSG::9104' => [
            'name' => 'arc-second',
        ],
        'urn:ogc:def:uom:EPSG::9105' => [
            'name' => 'grad',
        ],
        'urn:ogc:def:uom:EPSG::9107' => [
            'name' => 'degree minute second',
        ],
        'urn:ogc:def:uom:EPSG::9108' => [
            'name' => 'degree minute second hemisphere',
        ],
        'urn:ogc:def:uom:EPSG::9109' => [
            'name' => 'microradian',
        ],
        'urn:ogc:def:uom:EPSG::9110' => [
            'name' => 'sexagesimal DMS',
        ],
        'urn:ogc:def:uom:EPSG::9113' => [
            'name' => 'centesimal second',
        ],
        'urn:ogc:def:uom:EPSG::9115' => [
            'name' => 'degree minute',
        ],
        'urn:ogc:def:uom:EPSG::9116' => [
            'name' => 'degree hemisphere',
        ],
        'urn:ogc:def:uom:EPSG::9117' => [
            'name' => 'hemisphere degree',
        ],
        'urn:ogc:def:uom:EPSG::9118' => [
            'name' => 'degree minute hemisphere',
        ],
        'urn:ogc:def:uom:EPSG::9119' => [
            'name' => 'hemisphere degree minute',
        ],
        'urn:ogc:def:uom:EPSG::9120' => [
            'name' => 'hemisphere degree minute second',
        ],
    ];

    /**
     * @var array<string, array{name: string, fqcn: self}>
     */
    protected static array $customSridData = [];

    private static array $supportedCache = [];

    abstract public function __construct(float $angle);

    abstract public function asRadians(): Radian;

    public function asDegrees(): Degree
    {
        return new Degree($this->asRadians()->getValue() * 180 / M_PI);
    }

    public function add(self $unit): self
    {
        if ($this::class === $unit::class) {
            return new static($this->getValue() + $unit->getValue());
        }
        $resultAsRadians = new Radian($this->asRadians()->getValue() + $unit->asRadians()->getValue());
        $conversionRatio = (new static(1))->asRadians()->getValue();

        return new static($resultAsRadians->getValue() / $conversionRatio);
    }

    public function subtract(self $unit): self
    {
        if ($this::class === $unit::class) {
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

    public static function makeUnit(float|string $measurement, string $srid): self
    {
        if (isset(self::$customSridData[$srid])) {
            return new self::$customSridData[$srid]['fqcn']($measurement);
        }

        return match ($srid) {
            self::EPSG_RADIAN => new Radian((float) $measurement),
            self::EPSG_MICRORADIAN => new MicroRadian((float) $measurement),
            self::EPSG_DEGREE => new Degree((float) $measurement),
            self::EPSG_ARC_SECOND => new ArcSecond((float) $measurement),
            self::EPSG_MILLIARC_SECOND => new ArcSecond((float) $measurement / 1000),
            self::EPSG_GRAD => new Grad((float) $measurement),
            self::EPSG_CENTESIMAL_SECOND => new CentesimalSecond((float) $measurement),
            self::EPSG_DEGREE_MINUTE_SECOND => Degree::fromDegreeMinuteSecond((string) $measurement),
            self::EPSG_DEGREE_MINUTE_SECOND_HEMISPHERE => Degree::fromDegreeMinuteSecondHemisphere((string) $measurement),
            self::EPSG_HEMISPHERE_DEGREE_MINUTE_SECOND => Degree::fromHemisphereDegreeMinuteSecond((string) $measurement),
            self::EPSG_DEGREE_MINUTE => Degree::fromDegreeMinute((string) $measurement),
            self::EPSG_DEGREE_MINUTE_HEMISPHERE => Degree::fromDegreeMinuteHemisphere((string) $measurement),
            self::EPSG_HEMISPHERE_DEGREE_MINUTE => Degree::fromHemisphereDegreeMinute((string) $measurement),
            self::EPSG_DEGREE_HEMISPHERE => Degree::fromDegreeHemisphere((string) $measurement),
            self::EPSG_HEMISPHERE_DEGREE => Degree::fromHemisphereDegree((string) $measurement),
            self::EPSG_SEXAGESIMAL_DMS => Degree::fromSexagesimalDMS((string) $measurement),
            default => throw new UnknownUnitOfMeasureException($srid),
        };
    }

    public static function getSupportedSRIDs(): array
    {
        if (!self::$supportedCache) {
            foreach (static::$sridData as $srid => $data) {
                self::$supportedCache[$srid] = $data['name'];
            }
        }

        return self::$supportedCache;
    }

    public static function registerCustomUnit(string $srid, string $name, string $implementingClassFQCN): void
    {
        self::$customSridData[$srid] = ['name' => $name, 'fqcn' => $implementingClassFQCN];
        self::getSupportedSRIDs(); // init cache if not already
        self::$supportedCache[$srid] = $name; // update cache
    }

    public static function convert(self $angle, string $targetSRID): self
    {
        $conversionRatio = static::makeUnit(1, $targetSRID)->asRadians()->getValue();

        return self::makeUnit($angle->asRadians()->getValue() / $conversionRatio, $targetSRID);
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}

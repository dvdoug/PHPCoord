<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Length\Centimetre;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Length\Millimetre;
use PHPCoord\UnitOfMeasure\Scale\PartsPerBillion;
use PHPCoord\UnitOfMeasure\Scale\PartsPerMillion;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\Time\Time;
use PHPCoord\UnitOfMeasure\Time\Year;

use function array_map;

class Rate implements UnitOfMeasure
{
    /**
     * Arc-seconds per year
     * =((pi/180) / 3600) radians per year. Year taken to be IUGS definition of 31556925.445 seconds; see UoM code
     * 1029.
     */
    public const EPSG_ARC_SECONDS_PER_YEAR = 'urn:ogc:def:uom:EPSG::1043';

    /**
     * Centimetres per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_CENTIMETRES_PER_YEAR = 'urn:ogc:def:uom:EPSG::1034';

    /**
     * Metres per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_METRES_PER_YEAR = 'urn:ogc:def:uom:EPSG::1042';

    /**
     * Milliarc-seconds per year
     * = ((pi/180) / 3600 / 1000) radians per year. Year taken to be IUGS definition of 31556925.445 seconds; see UoM
     * code 1029.
     */
    public const EPSG_MILLIARC_SECONDS_PER_YEAR = 'urn:ogc:def:uom:EPSG::1032';

    /**
     * Millimetres per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_MILLIMETRES_PER_YEAR = 'urn:ogc:def:uom:EPSG::1027';

    /**
     * Parts per billion per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029. Billion is internationally
     * ambiguous, in different languages being 1E+9 and 1E+12. One billion taken here to be 1E+9.
     */
    public const EPSG_PARTS_PER_BILLION_PER_YEAR = 'urn:ogc:def:uom:EPSG::1030';

    /**
     * Parts per million per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_PARTS_PER_MILLION_PER_YEAR = 'urn:ogc:def:uom:EPSG::1041';

    /**
     * @var array<string, array{name: string, help: string}>
     */
    protected static array $sridData = [
        'urn:ogc:def:uom:EPSG::1027' => [
            'name' => 'millimetres per year',
            'help' => 'Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.',
        ],
        'urn:ogc:def:uom:EPSG::1030' => [
            'name' => 'parts per billion per year',
            'help' => 'Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029. Billion is internationally ambiguous, in different languages being 1E+9 and 1E+12. One billion taken here to be 1E+9.',
        ],
        'urn:ogc:def:uom:EPSG::1032' => [
            'name' => 'milliarc-seconds per year',
            'help' => '= ((pi/180) / 3600 / 1000) radians per year. Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.',
        ],
        'urn:ogc:def:uom:EPSG::1034' => [
            'name' => 'centimetres per year',
            'help' => 'Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.',
        ],
        'urn:ogc:def:uom:EPSG::1041' => [
            'name' => 'parts per million per year',
            'help' => 'Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.',
        ],
        'urn:ogc:def:uom:EPSG::1042' => [
            'name' => 'metres per year',
            'help' => 'Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.',
        ],
        'urn:ogc:def:uom:EPSG::1043' => [
            'name' => 'arc-seconds per year',
            'help' => '=((pi/180) / 3600) radians per year. Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.',
        ],
    ];

    private Angle|Length|Scale $change;

    private Time $time;

    public function __construct(Angle|Length|Scale $change, Time $time)
    {
        $this->change = $change;
        $this->time = $time;
    }

    public function getChange(): Angle|Length|Scale
    {
        return $this->change;
    }

    public function getChangePerYear(): Angle|Length|Scale
    {
        return $this->change->divide($this->time->asYears()->getValue());
    }

    public function getTime(): Time
    {
        return $this->time;
    }

    public function getValue(): float
    {
        return $this->change->getValue();
    }

    public function getUnitName(): string
    {
        return $this->change->getUnitName() . ' per ' . $this->time->getUnitName();
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }

    public function multiply(float $multiplicand): self
    {
        return new self($this->change->multiply($multiplicand), $this->time);
    }

    public static function makeUnit(float $measurement, string $srid): self
    {
        if (!isset(self::$sridData[$srid])) {
            throw new UnknownUnitOfMeasureException($srid);
        }

        return match ($srid) {
            self::EPSG_ARC_SECONDS_PER_YEAR => new self(new ArcSecond($measurement), new Year(1)),
            self::EPSG_MILLIARC_SECONDS_PER_YEAR => new self(Angle::makeUnit($measurement, Angle::EPSG_MILLIARC_SECOND), new Year(1)),
            self::EPSG_METRES_PER_YEAR => new self(new Metre($measurement), new Year(1)),
            self::EPSG_MILLIMETRES_PER_YEAR => new self(new Millimetre($measurement), new Year(1)),
            self::EPSG_CENTIMETRES_PER_YEAR => new self(new Centimetre($measurement), new Year(1)),
            self::EPSG_PARTS_PER_BILLION_PER_YEAR => new self(new PartsPerBillion($measurement), new Year(1)),
            self::EPSG_PARTS_PER_MILLION_PER_YEAR => new self(new PartsPerMillion($measurement), new Year(1)),
            default => throw new UnknownUnitOfMeasureException($srid),
        };
    }

    /**
     * @return array<string, string>
     */
    public static function getSupportedSRIDs(): array
    {
        return array_map(fn (array $data) => $data['name'], static::$sridData);
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
}

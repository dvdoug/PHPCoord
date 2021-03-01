<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

use PHPCoord\Exception\InvalidRateException;
use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Length\Centimetre;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Length\Millimetre;
use PHPCoord\UnitOfMeasure\Scale\PartsPerBillion;
use PHPCoord\UnitOfMeasure\Scale\PartsPerMillion;
use PHPCoord\UnitOfMeasure\Time\Time;
use PHPCoord\UnitOfMeasure\Time\Year;

class Rate implements UnitOfMeasure
{
    /**
     * arc-seconds per year
     * =((pi/180) / 3600) radians per year. Year taken to be IUGS definition of 31556925.445 seconds; see UoM code
     * 1029.
     */
    public const EPSG_ARC_SECONDS_PER_YEAR = 'urn:ogc:def:uom:EPSG::1043';

    /**
     * centimetres per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_CENTIMETRES_PER_YEAR = 'urn:ogc:def:uom:EPSG::1034';

    /**
     * metres per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_METRES_PER_YEAR = 'urn:ogc:def:uom:EPSG::1042';

    /**
     * milliarc-seconds per year
     * = ((pi/180) / 3600 / 1000) radians per year. Year taken to be IUGS definition of 31556925.445 seconds; see UoM
     * code 1029.
     */
    public const EPSG_MILLIARC_SECONDS_PER_YEAR = 'urn:ogc:def:uom:EPSG::1032';

    /**
     * millimetres per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_MILLIMETRES_PER_YEAR = 'urn:ogc:def:uom:EPSG::1027';

    /**
     * parts per billion per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029. Billion is internationally
     * ambiguous, in different languages being 1E+9 and 1E+12. One billion taken here to be 1E+9.
     */
    public const EPSG_PARTS_PER_BILLION_PER_YEAR = 'urn:ogc:def:uom:EPSG::1030';

    /**
     * parts per million per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_PARTS_PER_MILLION_PER_YEAR = 'urn:ogc:def:uom:EPSG::1041';

    protected static $sridData = [
        'urn:ogc:def:uom:EPSG::1027' => [
            'name' => 'millimetres per year',
        ],
        'urn:ogc:def:uom:EPSG::1030' => [
            'name' => 'parts per billion per year',
        ],
        'urn:ogc:def:uom:EPSG::1032' => [
            'name' => 'milliarc-seconds per year',
        ],
        'urn:ogc:def:uom:EPSG::1034' => [
            'name' => 'centimetres per year',
        ],
        'urn:ogc:def:uom:EPSG::1041' => [
            'name' => 'parts per million per year',
        ],
        'urn:ogc:def:uom:EPSG::1042' => [
            'name' => 'metres per year',
        ],
        'urn:ogc:def:uom:EPSG::1043' => [
            'name' => 'arc-seconds per year',
        ],
    ];

    private $change;

    private $time;

    public function __construct(UnitOfMeasure $change, Time $time)
    {
        if ($change instanceof Time) {
            throw new InvalidRateException('A rate is a change per unit of time, the change cannot be time');
        }

        $this->change = $change;
        $this->time = $time;
    }

    public function getChange(): UnitOfMeasure
    {
        return $this->change;
    }

    public function getChangePerYear(): UnitOfMeasure
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

    public static function makeUnit(float $measurement, string $srid): self
    {
        if (!isset(static::$sridData[$srid])) {
            throw new UnknownUnitOfMeasureException($srid);
        }

        switch ($srid) {
            case self::EPSG_ARC_SECONDS_PER_YEAR:
                return new self(new ArcSecond($measurement), new Year(1));
            case self::EPSG_MILLIARC_SECONDS_PER_YEAR:
                return new self(Angle::makeUnit($measurement, Angle::EPSG_MILLIARC_SECOND), new Year(1));
            case self::EPSG_METRES_PER_YEAR:
                return new self(new Metre($measurement), new Year(1));
            case self::EPSG_MILLIMETRES_PER_YEAR:
                return new self(new Millimetre($measurement), new Year(1));
            case self::EPSG_CENTIMETRES_PER_YEAR:
                return new self(new Centimetre($measurement), new Year(1));
            case self::EPSG_PARTS_PER_BILLION_PER_YEAR:
                return new self(new PartsPerBillion($measurement), new Year(1));
            case self::EPSG_PARTS_PER_MILLION_PER_YEAR:
                return new self(new PartsPerMillion($measurement), new Year(1));
        }

        throw new UnknownUnitOfMeasureException($srid); //@codeCoverageIgnore
    }

    public static function getSupportedSRIDs(): array
    {
        $supported = [];
        foreach (static::$sridData as $srid => $data) {
            $supported[$srid] = $data['name'];
        }

        return $supported;
    }
}

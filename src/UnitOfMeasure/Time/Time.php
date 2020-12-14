<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Time;

use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;

abstract class Time implements UnitOfMeasure
{
    /**
     * second
     * SI base unit for time. Not to be confused with the angle unit arc-second.
     */
    public const EPSG_SECOND = 'urn:ogc:def:uom:EPSG::1040';

    /**
     * year.
     */
    public const EPSG_YEAR = 'urn:ogc:def:uom:EPSG::1029';

    protected static array $sridData = [
        'urn:ogc:def:uom:EPSG::1029' => [
            'name' => 'year',
        ],
        'urn:ogc:def:uom:EPSG::1040' => [
            'name' => 'second',
        ],
    ];

    public const SECONDS_IN_YEAR = 31556925.445;

    abstract public function asSeconds(): Second;

    abstract public function asYears(): Year;

    public function add(self $unit): self
    {
        $resultAsSeconds = new Second($this->asSeconds()->getValue() + $unit->asSeconds()->getValue());
        $conversionRatio = (new static(1))->asSeconds()->getValue();

        return new static($resultAsSeconds->getValue() / $conversionRatio);
    }

    public function subtract(self $unit): self
    {
        $resultAsSeconds = new Second($this->asSeconds()->getValue() - $unit->asSeconds()->getValue());
        $conversionRatio = (new static(1))->asSeconds()->getValue();

        return new static($resultAsSeconds->getValue() / $conversionRatio);
    }

    public function multiply(float $multiplicand): self
    {
        return new static($this->getValue() * $multiplicand);
    }

    public function divide(float $divisor): self
    {
        return new static($this->getValue() / $divisor);
    }

    public static function makeUnit(float $measurement, string $srid): self
    {
        switch ($srid) {
            case self::EPSG_SECOND:
                return new Second($measurement);
            case self::EPSG_YEAR:
                return new Year($measurement);
        }

        throw new UnknownUnitOfMeasureException($srid);
    }

    public static function getSupportedSRIDs(): array
    {
        return array_map(function ($sridData) {return $sridData['name']; }, static::$sridData);
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Time;

use function array_map;
use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;

abstract class Time implements UnitOfMeasure
{
    /**
     * year.
     */
    public const EPSG_YEAR = 'urn:ogc:def:uom:EPSG::1029';

    protected static $sridData = [
        'urn:ogc:def:uom:EPSG::1029' => [
            'name' => 'year',
        ],
    ];

    abstract public function asYears(): Year;

    public function add(self $unit): self
    {
        $resultAsYears = new Year($this->asYears()->getValue() + $unit->asYears()->getValue());
        $conversionRatio = (new static(1))->asYears()->getValue();

        return new static($resultAsYears->getValue() / $conversionRatio);
    }

    public function subtract(self $unit): self
    {
        $resultAsYears = new Year($this->asYears()->getValue() - $unit->asYears()->getValue());
        $conversionRatio = (new static(1))->asYears()->getValue();

        return new static($resultAsYears->getValue() / $conversionRatio);
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

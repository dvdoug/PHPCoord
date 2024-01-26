<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Time;

use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;

use function array_map;

abstract class Time implements UnitOfMeasure
{
    /**
     * Year.
     */
    public const EPSG_YEAR = 'urn:ogc:def:uom:EPSG::1029';

    /**
     * @var array<string, array{name: string, fqcn?: class-string<self>, help: string}>
     */
    protected static array $sridData = [
        'urn:ogc:def:uom:EPSG::1029' => [
            'name' => 'year',
            'help' => '',
        ],
    ];

    abstract public function __construct(float $time);

    abstract public function asYears(): Year;

    public function add(self $unit): self
    {
        if (get_class($this) === get_class($unit)) {
            return new static($this->getValue() + $unit->getValue());
        }
        $resultAsYears = new Year($this->asYears()->getValue() + $unit->asYears()->getValue());
        $conversionRatio = (new static(1))->asYears()->getValue();

        return new static($resultAsYears->getValue() / $conversionRatio);
    }

    public function subtract(self $unit): self
    {
        if (get_class($this) === get_class($unit)) {
            return new static($this->getValue() - $unit->getValue());
        }
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

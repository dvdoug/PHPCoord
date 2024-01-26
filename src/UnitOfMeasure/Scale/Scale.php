<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Scale;

use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;

use function array_map;

abstract class Scale implements UnitOfMeasure
{
    /**
     * Coefficient
     * Used when parameters are coefficients.  They inherently take the units which depend upon the term to which the
     * coefficient applies.
     */
    public const EPSG_COEFFICIENT = 'urn:ogc:def:uom:EPSG::9203';

    /**
     * Parts per billion
     * Billion is internationally ambiguous, in different languages being 1E+9 and 1E+12. One billion taken here to be
     * 1E+9.
     */
    public const EPSG_PARTS_PER_BILLION = 'urn:ogc:def:uom:EPSG::1028';

    /**
     * Parts per million.
     */
    public const EPSG_PARTS_PER_MILLION = 'urn:ogc:def:uom:EPSG::9202';

    /**
     * Unity
     * EPSG standard unit for scale. SI coherent derived unit (standard unit) for dimensionless quantity, expressed by
     * the number one but this is not explicitly shown.
     */
    public const EPSG_UNITY = 'urn:ogc:def:uom:EPSG::9201';

    /**
     * @var array<string, array{name: string, fqcn?: class-string<self>, help: string}>
     */
    protected static array $sridData = [
        'urn:ogc:def:uom:EPSG::1028' => [
            'name' => 'parts per billion',
            'help' => 'Billion is internationally ambiguous, in different languages being 1E+9 and 1E+12. One billion taken here to be 1E+9.',
        ],
        'urn:ogc:def:uom:EPSG::9201' => [
            'name' => 'unity',
            'help' => 'EPSG standard unit for scale. SI coherent derived unit (standard unit) for dimensionless quantity, expressed by the number one but this is not explicitly shown.',
        ],
        'urn:ogc:def:uom:EPSG::9202' => [
            'name' => 'parts per million',
            'help' => '',
        ],
        'urn:ogc:def:uom:EPSG::9203' => [
            'name' => 'coefficient',
            'help' => 'Used when parameters are coefficients.  They inherently take the units which depend upon the term to which the coefficient applies.',
        ],
    ];

    abstract public function __construct(float $scale);

    abstract public function asUnity(): Unity;

    public function add(self $unit): self
    {
        if (get_class($this) === get_class($unit)) {
            return new static($this->getValue() + $unit->getValue());
        }
        $resultAsUnity = new Unity($this->asUnity()->getValue() + $unit->asUnity()->getValue());
        $conversionRatio = (new static(1))->asUnity()->getValue();

        return new static($resultAsUnity->getValue() / $conversionRatio);
    }

    public function subtract(self $unit): self
    {
        if (get_class($this) === get_class($unit)) {
            return new static($this->getValue() - $unit->getValue());
        }
        $resultAsUnity = new Unity($this->asUnity()->getValue() - $unit->asUnity()->getValue());
        $conversionRatio = (new static(1))->asUnity()->getValue();

        return new static($resultAsUnity->getValue() / $conversionRatio);
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
            case self::EPSG_COEFFICIENT:
                return new Coefficient($measurement);
            case self::EPSG_PARTS_PER_BILLION:
                return new PartsPerBillion($measurement);
            case self::EPSG_PARTS_PER_MILLION:
                return new PartsPerMillion($measurement);
            case self::EPSG_UNITY:
                return new Unity($measurement);
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

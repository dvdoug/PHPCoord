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

    protected static array $sridData = [
        'urn:ogc:def:uom:EPSG::1028' => [
            'name' => 'parts per billion',
        ],
        'urn:ogc:def:uom:EPSG::9201' => [
            'name' => 'unity',
        ],
        'urn:ogc:def:uom:EPSG::9202' => [
            'name' => 'parts per million',
        ],
        'urn:ogc:def:uom:EPSG::9203' => [
            'name' => 'coefficient',
        ],
    ];

    /**
     * @var array<string, array{name: string, fqcn: self}>
     */
    protected static array $customSridData = [];

    private static array $supportedCache = [];

    abstract public function __construct(float $scale);

    abstract public function asUnity(): Unity;

    public function add(self $unit): self
    {
        if ($this::class === $unit::class) {
            return new static($this->getValue() + $unit->getValue());
        }
        $resultAsUnity = new Unity($this->asUnity()->getValue() + $unit->asUnity()->getValue());
        $conversionRatio = (new static(1))->asUnity()->getValue();

        return new static($resultAsUnity->getValue() / $conversionRatio);
    }

    public function subtract(self $unit): self
    {
        if ($this::class === $unit::class) {
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
        if (isset(self::$customSridData[$srid])) {
            return new self::$customSridData[$srid]['fqcn']($measurement);
        }

        return match ($srid) {
            self::EPSG_COEFFICIENT => new Coefficient($measurement),
            self::EPSG_PARTS_PER_BILLION => new PartsPerBillion($measurement),
            self::EPSG_PARTS_PER_MILLION => new PartsPerMillion($measurement),
            self::EPSG_UNITY => new Unity($measurement),
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

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}

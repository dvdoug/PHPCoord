<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

/**
 * US Survey foot, now deprecated by NIST who would prefer you use metres (or international feet if you can't).
 * Please check carefully whether your measurements are in the survey foot or the international foot, both are
 * widespread.
 */
class USSurveyFoot extends Length
{
    private float $length;

    public function __construct(float $length)
    {
        $this->length = $length;
    }

    public function asMetres(): Metre
    {
        return new Metre($this->length * 12 / 39.37);
    }

    public function getValue(): float
    {
        return $this->length;
    }

    public function getUnitName(): string
    {
        return 'US survey foot';
    }
}

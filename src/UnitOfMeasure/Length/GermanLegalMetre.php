<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

/**
 * German Legal Metre.
 * Unless you are in Namibia, you probably don't want this. Germany does not use this, @see Metre instead.
 */
class GermanLegalMetre extends Length
{
    private $length;

    public function __construct(float $length)
    {
        $this->length = $length;
    }

    public function asMetres(): Metre
    {
        return new Metre($this->length * 1.0000135965);
    }

    public function getValue(): float
    {
        return $this->length;
    }

    public function getUnitName(): string
    {
        return 'German legal metre';
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Scale;

use PHPUnit\Framework\TestCase;

class CoefficientTest extends TestCase
{
    public function testAsUnity(): void
    {
        $original = new Coefficient(0.12);
        $asUnity = $original->asUnity();
        self::assertInstanceOf(Unity::class, $asUnity);
        self::assertEquals(0.12, $asUnity->getValue());
    }

    public function testGetValue(): void
    {
        $original = new Coefficient(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new Coefficient(0.12);
        self::assertEquals('coefficient', $original->getUnitName());
    }
}

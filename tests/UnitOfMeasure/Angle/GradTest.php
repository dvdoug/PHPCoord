<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

use PHPUnit\Framework\TestCase;

use const M_PI;

class GradTest extends TestCase
{
    public function testAsRadians(): void
    {
        $original = new Grad(200 / M_PI);
        $asRadian = $original->asRadians();
        self::assertInstanceOf(Radian::class, $asRadian);
        self::assertEquals(1, $asRadian->getValue());
    }

    public function testGetValue(): void
    {
        $original = new Grad(60);
        self::assertEquals(60, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new Grad(60);
        self::assertEquals('grad', $original->getUnitName());
    }
}

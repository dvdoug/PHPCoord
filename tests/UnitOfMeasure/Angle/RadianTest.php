<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace UnitOfMeasure\Angle;

use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPUnit\Framework\TestCase;

class RadianTest extends TestCase
{
    public function testAsRadians(): void
    {
        $original = new Radian(0.12);
        $asRadian = $original->asRadians();
        self::assertInstanceOf(Radian::class, $asRadian);
        self::assertEquals(0.12, $asRadian->getValue());
    }

    public function testGetValue(): void
    {
        $original = new Radian(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetFormattedValue(): void
    {
        $original = new Radian(0.12);
        self::assertEquals('0.12 rad', $original->getFormattedValue());
    }

    public function testGetUnitName(): void
    {
        $original = new Radian(0.12);
        self::assertEquals('radian', $original->getUnitName());
    }
}

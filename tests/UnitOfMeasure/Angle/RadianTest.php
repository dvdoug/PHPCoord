<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

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

    public function testGetUnitName(): void
    {
        $original = new Radian(0.12);
        self::assertEquals('radian', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new Radian(1))->add((new Radian(2)));
        self::assertInstanceOf(Radian::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new Radian(4))->subtract((new Radian(3)));
        self::assertInstanceOf(Radian::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new Radian(1))->multiply(2.5);
        self::assertInstanceOf(Radian::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new Radian(3))->divide(2);
        self::assertInstanceOf(Radian::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

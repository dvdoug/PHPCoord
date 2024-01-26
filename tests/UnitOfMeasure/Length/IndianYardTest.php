<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class IndianYardTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new IndianYard(0.13123380666666665);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEqualsWithDelta(0.12, $asMetre->getValue(), 0.00000000000001);
    }

    public function testGetValue(): void
    {
        $original = new IndianYard(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new IndianYard(0.12);
        self::assertEquals('Indian yard', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new IndianYard(1))->add(new IndianYard(2));
        self::assertInstanceOf(IndianYard::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new IndianYard(4))->subtract(new IndianYard(3));
        self::assertInstanceOf(IndianYard::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new IndianYard(1))->multiply(2.5);
        self::assertInstanceOf(IndianYard::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new IndianYard(3))->divide(2);
        self::assertInstanceOf(IndianYard::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class IndianYard1962Test extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new IndianYard1962(0.13123376802331763);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new IndianYard1962(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new IndianYard1962(0.12);
        self::assertEquals('Indian(1962) yard', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new IndianYard1962(1))->add((new IndianYard1962(2)));
        self::assertInstanceOf(IndianYard1962::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new IndianYard1962(4))->subtract((new IndianYard1962(3)));
        self::assertInstanceOf(IndianYard1962::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new IndianYard1962(1))->multiply(2.5);
        self::assertInstanceOf(IndianYard1962::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new IndianYard1962(3))->divide(2);
        self::assertInstanceOf(IndianYard1962::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

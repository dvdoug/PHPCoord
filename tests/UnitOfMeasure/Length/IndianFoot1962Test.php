<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class IndianFoot1962Test extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new IndianFoot1962(0.39370130406995285);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new IndianFoot1962(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new IndianFoot1962(0.12);
        self::assertEquals('Indian(1962) feet', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new IndianFoot1962(1))->add((new IndianFoot1962(2)));
        self::assertInstanceOf(IndianFoot1962::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new IndianFoot1962(4))->subtract((new IndianFoot1962(3)));
        self::assertInstanceOf(IndianFoot1962::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new IndianFoot1962(1))->multiply(2.5);
        self::assertInstanceOf(IndianFoot1962::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new IndianFoot1962(3))->divide(2);
        self::assertInstanceOf(IndianFoot1962::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

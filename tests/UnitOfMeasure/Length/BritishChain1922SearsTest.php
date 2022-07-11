<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class BritishChain1922SearsTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new BritishChain1922Sears(0.005965173787878788);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new BritishChain1922Sears(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new BritishChain1922Sears(0.12);
        self::assertEquals('British chain (Sears 1922)', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new BritishChain1922Sears(1))->add(new BritishChain1922Sears(2));
        self::assertInstanceOf(BritishChain1922Sears::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new BritishChain1922Sears(4))->subtract(new BritishChain1922Sears(3));
        self::assertInstanceOf(BritishChain1922Sears::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new BritishChain1922Sears(1))->multiply(2.5);
        self::assertInstanceOf(BritishChain1922Sears::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new BritishChain1922Sears(3))->divide(2);
        self::assertInstanceOf(BritishChain1922Sears::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

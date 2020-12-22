<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class BritishLink1895BenoitBTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new BritishLink1895BenoitB(0.5965168636363637);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new BritishLink1895BenoitB(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new BritishLink1895BenoitB(0.12);
        self::assertEquals('British(1895 Benoit B) link', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new BritishLink1895BenoitB(1))->add((new BritishLink1895BenoitB(2)));
        self::assertInstanceOf(BritishLink1895BenoitB::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new BritishLink1895BenoitB(4))->subtract((new BritishLink1895BenoitB(3)));
        self::assertInstanceOf(BritishLink1895BenoitB::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new BritishLink1895BenoitB(1))->multiply(2.5);
        self::assertInstanceOf(BritishLink1895BenoitB::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new BritishLink1895BenoitB(3))->divide(2);
        self::assertInstanceOf(BritishLink1895BenoitB::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}
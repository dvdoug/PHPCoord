<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class MillimetreTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new Millimetre(120);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new Millimetre(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new Millimetre(0.12);
        self::assertEquals('millimetre', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new Millimetre(1))->add(new Millimetre(2));
        self::assertInstanceOf(Millimetre::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new Millimetre(4))->subtract(new Millimetre(3));
        self::assertInstanceOf(Millimetre::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new Millimetre(1))->multiply(2.5);
        self::assertInstanceOf(Millimetre::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new Millimetre(3))->divide(2);
        self::assertInstanceOf(Millimetre::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

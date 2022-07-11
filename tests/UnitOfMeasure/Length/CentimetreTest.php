<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class CentimetreTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new Centimetre(12);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new Centimetre(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new Centimetre(0.12);
        self::assertEquals('centimetre', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new Centimetre(1))->add(new Centimetre(2));
        self::assertInstanceOf(Centimetre::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new Centimetre(4))->subtract(new Centimetre(3));
        self::assertInstanceOf(Centimetre::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new Centimetre(1))->multiply(2.5);
        self::assertInstanceOf(Centimetre::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new Centimetre(3))->divide(2);
        self::assertInstanceOf(Centimetre::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

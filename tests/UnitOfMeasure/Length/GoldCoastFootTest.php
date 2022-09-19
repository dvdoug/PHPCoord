<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class GoldCoastFootTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new GoldCoastFoot(0.3937011617515639);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEqualsWithDelta(0.12, $asMetre->getValue(), 0.00000000000001);
    }

    public function testGetValue(): void
    {
        $original = new GoldCoastFoot(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new GoldCoastFoot(0.12);
        self::assertEquals('Gold Coast foot', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new GoldCoastFoot(1))->add(new GoldCoastFoot(2));
        self::assertInstanceOf(GoldCoastFoot::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new GoldCoastFoot(4))->subtract(new GoldCoastFoot(3));
        self::assertInstanceOf(GoldCoastFoot::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new GoldCoastFoot(1))->multiply(2.5);
        self::assertInstanceOf(GoldCoastFoot::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new GoldCoastFoot(3))->divide(2);
        self::assertInstanceOf(GoldCoastFoot::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

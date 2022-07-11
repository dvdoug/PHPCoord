<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class ClarkeFootTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new ClarkeFoot(0.39370431963199626);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new ClarkeFoot(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new ClarkeFoot(0.12);
        self::assertEquals("Clarke's foot", $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new ClarkeFoot(1))->add(new ClarkeFoot(2));
        self::assertInstanceOf(ClarkeFoot::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new ClarkeFoot(4))->subtract(new ClarkeFoot(3));
        self::assertInstanceOf(ClarkeFoot::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new ClarkeFoot(1))->multiply(2.5);
        self::assertInstanceOf(ClarkeFoot::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new ClarkeFoot(3))->divide(2);
        self::assertInstanceOf(ClarkeFoot::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

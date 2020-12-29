<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class FootTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new Foot(0.39370078740157477);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new Foot(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new Foot(0.12);
        self::assertEquals('feet', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new Foot(1))->add((new Foot(2)));
        self::assertInstanceOf(Foot::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new Foot(4))->subtract((new Foot(3)));
        self::assertInstanceOf(Foot::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new Foot(1))->multiply(2.5);
        self::assertInstanceOf(Foot::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new Foot(3))->divide(2);
        self::assertInstanceOf(Foot::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

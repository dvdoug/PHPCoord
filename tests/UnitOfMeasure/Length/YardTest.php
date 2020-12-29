<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class YardTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new Yard(0.13123359580052493);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new Yard(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new Yard(0.12);
        self::assertEquals('yard', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new Yard(1))->add((new Yard(2)));
        self::assertInstanceOf(Yard::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new Yard(4))->subtract((new Yard(3)));
        self::assertInstanceOf(Yard::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new Yard(1))->multiply(2.5);
        self::assertInstanceOf(Yard::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new Yard(3))->divide(2);
        self::assertInstanceOf(Yard::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

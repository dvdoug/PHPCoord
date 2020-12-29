<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class ChainTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new Chain(0.005965163445478406);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new Chain(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new Chain(0.12);
        self::assertEquals('chain', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new Chain(1))->add((new Chain(2)));
        self::assertInstanceOf(Chain::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new Chain(4))->subtract((new Chain(3)));
        self::assertInstanceOf(Chain::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new Chain(1))->multiply(2.5);
        self::assertInstanceOf(Chain::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new Chain(3))->divide(2);
        self::assertInstanceOf(Chain::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

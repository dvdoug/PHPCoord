<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class ClarkeChainTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new ClarkeChain(0.005965216964121156);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new ClarkeChain(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new ClarkeChain(0.12);
        self::assertEquals('Clarke chain', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new ClarkeChain(1))->add((new ClarkeChain(2)));
        self::assertInstanceOf(ClarkeChain::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new ClarkeChain(4))->subtract((new ClarkeChain(3)));
        self::assertInstanceOf(ClarkeChain::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new ClarkeChain(1))->multiply(2.5);
        self::assertInstanceOf(ClarkeChain::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new ClarkeChain(3))->divide(2);
        self::assertInstanceOf(ClarkeChain::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

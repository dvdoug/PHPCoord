<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class BritishChain1922SearsTruncatedTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new BritishChain1922SearsTruncated(0.005965176492671085);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEqualsWithDelta(0.12, $asMetre->getValue(), 0.00000000000001);
    }

    public function testGetValue(): void
    {
        $original = new BritishChain1922SearsTruncated(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new BritishChain1922SearsTruncated(0.12);
        self::assertEquals('British chain (Sears 1922 truncated)', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new BritishChain1922SearsTruncated(1))->add(new BritishChain1922SearsTruncated(2));
        self::assertInstanceOf(BritishChain1922SearsTruncated::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new BritishChain1922SearsTruncated(4))->subtract(new BritishChain1922SearsTruncated(3));
        self::assertInstanceOf(BritishChain1922SearsTruncated::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new BritishChain1922SearsTruncated(1))->multiply(2.5);
        self::assertInstanceOf(BritishChain1922SearsTruncated::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new BritishChain1922SearsTruncated(3))->divide(2);
        self::assertInstanceOf(BritishChain1922SearsTruncated::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

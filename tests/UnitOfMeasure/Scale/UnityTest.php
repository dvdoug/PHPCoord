<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Scale;

use PHPUnit\Framework\TestCase;

class UnityTest extends TestCase
{
    public function testAsUnity(): void
    {
        $original = new Unity(0.12);
        $asUnity = $original->asUnity();
        self::assertInstanceOf(Unity::class, $asUnity);
        self::assertEquals(0.12, $asUnity->getValue());
    }

    public function testGetValue(): void
    {
        $original = new Unity(0.12);
        self::assertEquals(0.12, $original->getValue());
        self::assertEquals(0.12, $original->__toString());
    }

    public function testGetUnitName(): void
    {
        $original = new Unity(0.12);
        self::assertEquals('unity', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new Unity(1))->add(new Unity(2));
        self::assertInstanceOf(Unity::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new Unity(4))->subtract(new Unity(3));
        self::assertInstanceOf(Unity::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new Unity(1))->multiply(2.5);
        self::assertInstanceOf(Unity::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new Unity(3))->divide(2);
        self::assertInstanceOf(Unity::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

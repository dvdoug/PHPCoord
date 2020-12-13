<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Time;

use PHPUnit\Framework\TestCase;

class SecondTest extends TestCase
{
    public function testAsSecond(): void
    {
        $original = new Second(0.12);
        $asSecond = $original->asSeconds();
        self::assertInstanceOf(Second::class, $asSecond);
        self::assertEquals(0.12, $asSecond->getValue());
    }

    public function testGetValue(): void
    {
        $original = new Second(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetFormattedValue(): void
    {
        $original = new Second(0.12);
        self::assertEquals('0.12s', $original->getFormattedValue());
    }

    public function testGetUnitName(): void
    {
        $original = new Second(0.12);
        self::assertEquals('second', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new Second(1))->add((new Second(2)));
        self::assertInstanceOf(Second::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new Second(4))->subtract((new Second(3)));
        self::assertInstanceOf(Second::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new Second(1))->multiply(2.5);
        self::assertInstanceOf(Second::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new Second(3))->divide(2);
        self::assertInstanceOf(Second::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}

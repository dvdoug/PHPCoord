<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

use PHPCoord\Exception\InvalidRateException;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Time\Second;
use PHPCoord\UnitOfMeasure\Time\Year;
use PHPUnit\Framework\TestCase;

class RateTest extends TestCase
{
    public function testMetrePerSecond(): void
    {
        $original = new Rate(new Metre(0.12), new Second(1));
        self::assertEquals(0.12, $original->getValue());
        self::assertInstanceOf(Metre::class, $original->getChange());
        self::assertEquals(0.12, $original->getChange()->getValue());
        self::assertInstanceOf(Second::class, $original->getTime());
        self::assertEquals(1, $original->getTime()->getValue());
        self::assertEquals('metre per second', $original->getUnitName());
        self::assertEquals('0.12 metre per second', $original->getFormattedValue());
    }

    public function testGetValue(): void
    {
        $original = new Metre(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetFormattedValue(): void
    {
        $original = new Metre(0.12);
        self::assertEquals('0.12m', $original->getFormattedValue());
    }

    public function testGetUnitName(): void
    {
        $original = new Metre(0.12);
        self::assertEquals('metre', $original->getUnitName());
    }

    public function testYearPerSecond(): void
    {
        $this->expectException(InvalidRateException::class);
        $original = new Rate(new Year(1), new Second(1));
    }
}

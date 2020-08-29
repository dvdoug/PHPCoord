<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace UnitOfMeasure\Time;

use PHPCoord\UnitOfMeasure\Time\Second;
use PHPCoord\UnitOfMeasure\Time\Year;
use PHPUnit\Framework\TestCase;

class YearTest extends TestCase
{
    public function testAsSeconds(): void
    {
        $original = new Year(1);
        $asSecond = $original->asSeconds();
        self::assertInstanceOf(Second::class, $asSecond);
        self::assertEquals(31556925.445, $asSecond->getValue());
    }

    public function testGetValue(): void
    {
        $original = new Year(120000);
        self::assertEquals(120000, $original->getValue());
    }

    public function testGetFormattedValue(): void
    {
        $original = new Year(120000);
        self::assertEquals('120000 years', $original->getFormattedValue());
    }

    public function testGetUnitName(): void
    {
        $original = new Year(120000);
        self::assertEquals('years', $original->getUnitName());
    }
}

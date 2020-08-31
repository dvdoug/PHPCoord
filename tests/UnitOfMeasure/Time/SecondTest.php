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
        self::assertEquals('seconds', $original->getUnitName());
    }
}

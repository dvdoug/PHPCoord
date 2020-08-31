<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class MetreTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new Metre(0.12);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
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
}

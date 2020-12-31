<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use PHPUnit\Framework\TestCase;

class ExoticLengthTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = UnitOfMeasureFactory::makeUnit(12, UnitOfMeasure::EPSG_LENGTH_CENTIMETRE);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = UnitOfMeasureFactory::makeUnit(120000, UnitOfMeasure::EPSG_LENGTH_CENTIMETRE);
        self::assertEquals(120000, $original->getValue());
    }

    public function testGetFormattedValue(): void
    {
        $original = UnitOfMeasureFactory::makeUnit(120000, UnitOfMeasure::EPSG_LENGTH_CENTIMETRE);
        self::assertEquals('120000 centimetre', $original->getFormattedValue());
    }

    public function testGetUnitName(): void
    {
        $original = UnitOfMeasureFactory::makeUnit(120000, UnitOfMeasure::EPSG_LENGTH_CENTIMETRE);
        self::assertEquals('centimetre', $original->getUnitName());
    }
}

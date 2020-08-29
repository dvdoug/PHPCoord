<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace UnitOfMeasure\Length;

use PHPCoord\UnitOfMeasure\Factory;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\TestCase;

class ExoticLengthTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = Factory::makeUnit(12, 1033); //centimetre
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = Factory::makeUnit(120000, 1033); //centimetre
        self::assertEquals(120000, $original->getValue());
    }

    public function testGetFormattedValue(): void
    {
        $original = Factory::makeUnit(120000, 1033); //centimetre
        self::assertEquals('120000 centimetre', $original->getFormattedValue());
    }

    public function testGetUnitName(): void
    {
        $original = Factory::makeUnit(120000, 1033); //centimetre
        self::assertEquals('centimetre', $original->getUnitName());
    }
}

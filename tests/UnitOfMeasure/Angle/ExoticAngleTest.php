<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace UnitOfMeasure\Angle;

use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Factory;
use PHPUnit\Framework\TestCase;

class ExoticAngleTest extends TestCase
{
    public function testAsRadians(): void
    {
        $original = Factory::makeUnit(120000, 9109); //microradian
        $asRadian = $original->asRadians();
        self::assertInstanceOf(Radian::class, $asRadian);
        self::assertEquals(0.12, $asRadian->getValue());
    }

    public function testGetValue(): void
    {
        $original = Factory::makeUnit(120000, 9109); //microradian
        self::assertEquals(120000, $original->getValue());
    }

    public function testGetFormattedValue(): void
    {
        $original = Factory::makeUnit(120000, 9109); //microradian
        self::assertEquals('120000 microradian', $original->getFormattedValue());
    }

    public function testGetUnitName(): void
    {
        $original = Factory::makeUnit(120000, 9109); //microradian
        self::assertEquals('microradian', $original->getUnitName());
    }
}

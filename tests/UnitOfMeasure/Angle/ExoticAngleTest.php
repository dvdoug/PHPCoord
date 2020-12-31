<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use PHPUnit\Framework\TestCase;

class ExoticAngleTest extends TestCase
{
    public function testAsRadians(): void
    {
        $original = UnitOfMeasureFactory::makeUnit(120000, UnitOfMeasure::EPSG_ANGLE_MICRORADIAN);
        $asRadian = $original->asRadians();
        self::assertInstanceOf(Radian::class, $asRadian);
        self::assertEquals(0.12, $asRadian->getValue());
    }

    public function testGetValue(): void
    {
        $original = UnitOfMeasureFactory::makeUnit(120000, UnitOfMeasure::EPSG_ANGLE_MICRORADIAN);
        self::assertEquals(120000, $original->getValue());
    }

    public function testGetFormattedValue(): void
    {
        $original = UnitOfMeasureFactory::makeUnit(120000, UnitOfMeasure::EPSG_ANGLE_MICRORADIAN);
        self::assertEquals('120000 microradian', $original->getFormattedValue());
    }

    public function testGetUnitName(): void
    {
        $original = UnitOfMeasureFactory::makeUnit(120000, UnitOfMeasure::EPSG_ANGLE_MICRORADIAN);
        self::assertEquals('microradian', $original->getUnitName());
    }
}

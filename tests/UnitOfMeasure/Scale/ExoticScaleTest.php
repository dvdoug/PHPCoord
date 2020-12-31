<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Scale;

use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use PHPUnit\Framework\TestCase;

class ExoticScaleTest extends TestCase
{
    public function testAsUnitys(): void
    {
        $original = UnitOfMeasureFactory::makeUnit(120000, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION);
        $asUnity = $original->asUnity();
        self::assertInstanceOf(Unity::class, $asUnity);
        self::assertEquals(0.12, $asUnity->getValue());
    }

    public function testGetValue(): void
    {
        $original = UnitOfMeasureFactory::makeUnit(120000, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION);
        self::assertEquals(120000, $original->getValue());
    }

    public function testGetFormattedValue(): void
    {
        $original = UnitOfMeasureFactory::makeUnit(120000, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION);
        self::assertEquals('120000 parts per million', $original->getFormattedValue());
    }

    public function testGetUnitName(): void
    {
        $original = UnitOfMeasureFactory::makeUnit(120000, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION);
        self::assertEquals('parts per million', $original->getUnitName());
    }
}

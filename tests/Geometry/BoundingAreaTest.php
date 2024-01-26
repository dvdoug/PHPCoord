<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry;

use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\Datum\Datum;
use PHPCoord\Geometry\Extents\BoundingBoxOnly\Extent2157;
use PHPCoord\Geometry\Extents\BoundingBoxOnly\Extent2706;
use PHPCoord\Geometry\Extents\Extent3914;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPUnit\Framework\TestCase;

class BoundingAreaTest extends TestCase
{
    public function testCentreOfWorld(): void
    {
        $polygon = BoundingArea::createWorld();
        [$latitude, $longitude] = $polygon->getPointInside();

        self::assertEquals(0, $latitude->getValue());
        self::assertEquals(0, $longitude->getValue());
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(0), new Degree(0), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
    }

    public function testGB(): void
    {
        $polygon = BoundingArea::createFromArray(
            [
                [
                    [
                        [-9, 49.75],
                        [-9, 61.01],
                        [2.01, 61.01],
                        [2.01, 49.75],
                        [-9, 49.75],
                    ],
                ],
          ]
        );
        [$latitude, $longitude] = $polygon->getPointInside();

        self::assertEqualsWithDelta(55.38, $latitude->getValue(), 0.0000000000001);
        self::assertEqualsWithDelta(-3.495, $longitude->getValue(), 0.0000000000001);
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(50), new Degree(-8), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertFalse($polygon->containsPoint(new GeographicValue(new Degree(50), new Degree(-9.1), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
    }

    public function testNZ(): void
    {
        $polygon = BoundingArea::createFromArray(
            [
                [
                    [
                        [160.6, -55.95],
                        [188.8, -55.95],
                        [188.8, -25.88],
                        [160.6, -25.88],
                        [160.6, -55.95],
                    ],
                ],
            ]
        );
        [$latitude, $longitude] = $polygon->getPointInside();

        self::assertEqualsWithDelta(-40.915, $latitude->getValue(), 0.0000000000001);
        self::assertEqualsWithDelta(174.7, $longitude->getValue(), 0.0000000000001);
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(-55), new Degree(170), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertFalse($polygon->containsPoint(new GeographicValue(new Degree(-55), new Degree(0), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
    }

    public function testPolygonWithHole(): void
    {
        $polygon = BoundingArea::createFromArray((new Extent3914())());
        self::assertFalse($polygon->containsPoint(new GeographicValue(new Degree(41), new Degree(8.4), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(42), new Degree(8.4), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertFalse($polygon->containsPoint(new GeographicValue(new Degree(42), new Degree(8.6), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(42), new Degree(10.0), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
    }

    public function testAreaCrossesNegativeAntimeridian(): void
    {
        $polygon = BoundingArea::createFromArray((new Extent2157())());
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(52.5), new Degree(-186.5), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(52.5), new Degree(173.5), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
    }

    public function testAreaCrossesPositiveAntimeridian(): void
    {
        $polygon = BoundingArea::createFromArray((new Extent2706())());
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(65), new Degree(181), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(65), new Degree(-179), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
    }
}

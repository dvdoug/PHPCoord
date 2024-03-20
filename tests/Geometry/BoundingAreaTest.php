<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry;

use Composer\InstalledVersions;
use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\Datum\Datum;
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
        $polygon = BoundingArea::createFromPolygons(
            [
                new Polygon(
                    new LinearRing(
                        new Position(-9, 49.75),
                        new Position(-9, 61.01),
                        new Position(2.01, 61.01),
                        new Position(2.01, 49.75),
                        new Position(-9, 49.75),
                    ),
                ),
            ],
            RegionMap::REGION_EUROPE
        );
        [$latitude, $longitude] = $polygon->getPointInside();

        self::assertEqualsWithDelta(55.38, $latitude->getValue(), 0.0000000000001);
        self::assertEqualsWithDelta(-3.495, $longitude->getValue(), 0.0000000000001);
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(50), new Degree(-8), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertFalse($polygon->containsPoint(new GeographicValue(new Degree(50), new Degree(-9.1), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
    }

    public function testNZ(): void
    {
        $polygon = BoundingArea::createFromPolygons(
            [
                new Polygon(
                    new LinearRing(
                        new Position(160.6, -55.95),
                        new Position(188.8, -55.95),
                        new Position(188.8, -25.88),
                        new Position(160.6, -25.88),
                        new Position(160.6, -55.95),
                    ),
                ),
            ],
            RegionMap::REGION_OCEANIA
        );
        [$latitude, $longitude] = $polygon->getPointInside();

        self::assertEqualsWithDelta(-40.915, $latitude->getValue(), 0.0000000000001);
        self::assertEqualsWithDelta(174.7, $longitude->getValue(), 0.0000000000001);
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(-55), new Degree(170), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertFalse($polygon->containsPoint(new GeographicValue(new Degree(-55), new Degree(0), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
    }

    public function testPolygonWithHole(): void
    {
        $this->markTestSkipped();
        $polygon = BoundingArea::createFromExtentCodes(['urn:ogc:def:area:EPSG::3914']);
        self::assertFalse($polygon->containsPoint(new GeographicValue(new Degree(41), new Degree(8.4), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(42), new Degree(8.4), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertFalse($polygon->containsPoint(new GeographicValue(new Degree(42), new Degree(8.8), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(42), new Degree(10.0), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
    }

    public function testAreaCrossesNegativeAntimeridian(): void
    {
        $polygon = BoundingArea::createFromExtentCodes(['urn:ogc:def:area:EPSG::2157']);
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(52.5), new Degree(-186.5), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(52.5), new Degree(173.5), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
    }

    public function testAreaCrossesPositiveAntimeridian(): void
    {
        $polygon = BoundingArea::createFromExtentCodes(['urn:ogc:def:area:EPSG::2706']);
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(66), new Degree(181), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(66), new Degree(-179), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
    }

    public function testNetherlandsBufferedCorrectly(): void
    {
        if (InstalledVersions::isInstalled(RegionMap::PACKAGES[RegionMap::REGION_EUROPE])) {
            $polygon = BoundingArea::createFromExtentCodes(['urn:ogc:def:area:EPSG::1275']);
            self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(50.965613067768), new Degree(5.8249181759236), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        }
    }
}

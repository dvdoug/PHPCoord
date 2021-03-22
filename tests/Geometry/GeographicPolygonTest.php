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
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPUnit\Framework\TestCase;

class GeographicPolygonTest extends TestCase
{
    public function testCentreOfWorld(): void
    {
        $polygon = GeographicPolygon::createWorld();
        [$latitude, $longitude] = $polygon->getCentre();

        self::assertEquals(0, $latitude->getValue());
        self::assertEquals(0, $longitude->getValue());
        self::assertEquals(-64800, $polygon->getArea());
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(0), new Degree(0), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
    }

    public function testGB(): void
    {
        $polygon = GeographicPolygon::createFromArray(
            [
              [-9, 49.75],
              [-9, 61.01],
              [2.01, 61.01],
              [2.01, 49.75],
          ],
          false
        );
        [$latitude, $longitude] = $polygon->getCentre();

        self::assertEquals(55.38, $latitude->getValue());
        self::assertEquals(-3.495, $longitude->getValue());
        self::assertEquals(-123.9726, $polygon->getArea());
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(50), new Degree(-8), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertFalse($polygon->containsPoint(new GeographicValue(new Degree(50), new Degree(-9.1), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
    }

    public function testNZ(): void
    {
        $polygon = GeographicPolygon::createFromArray(
            [
                [160.6, -55.95],
                [-171.2, -55.95],
                [-171.2, -25.88],
                [160.6, -25.88],
            ],
            true
        );
        [$latitude, $longitude] = $polygon->getCentre();

        self::assertEquals(-40.915, $latitude->getValue());
        self::assertEquals(174.7, $longitude->getValue());
        self::assertEquals(847.974, $polygon->getArea());
        self::assertTrue($polygon->containsPoint(new GeographicValue(new Degree(-55), new Degree(170), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
        self::assertFalse($polygon->containsPoint(new GeographicValue(new Degree(-55), new Degree(0), null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE))));
    }
}

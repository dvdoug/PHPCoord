<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\TestCase;

class UTMPointTest extends TestCase
{
    public function testAsGeographicPointNorthernHemisphere(): void
    {
        $from = new UTMPoint(new Metre(630084), new Metre(4833439), 17, UTMPoint::HEMISPHERE_NORTH, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $to = $from->asGeographicPoint();

        self::assertEqualsWithDelta(43.642567, $to->getLatitude()->getValue(), 0.00001);
        self::assertEqualsWithDelta(-79.387139, $to->getLongitude()->getValue(), 0.00001);
    }

    public function testAsGeographicPointSouthernHemisphere(): void
    {
        $from = new UTMPoint(new Metre(334519), new Metre(6251930), 56, UTMPoint::HEMISPHERE_SOUTH, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $to = $from->asGeographicPoint();

        self::assertEqualsWithDelta(-33.859972, $to->getLatitude()->getValue(), 0.00001);
        self::assertEqualsWithDelta(151.211111, $to->getLongitude()->getValue(), 0.00001);
    }

    public function testDistanceSameZone(): void
    {
        $from = new UTMPoint(new Metre(630084), new Metre(4833439), 32, UTMPoint::HEMISPHERE_NORTH, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $to = new UTMPoint(new Metre(630584), new Metre(4833439), 32, UTMPoint::HEMISPHERE_NORTH, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $distance = $from->calculateDistance($to);

        self::assertEquals($distance->getValue(), 500);
    }

    public function testDistanceSameZoneDifferentCRS(): void
    {
        $from = new UTMPoint(new Metre(630084), new Metre(4833439), 32, UTMPoint::HEMISPHERE_NORTH, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $to = new UTMPoint(new Metre(630584), new Metre(4833439), 32, UTMPoint::HEMISPHERE_NORTH, Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89));
        $distance = $from->calculateDistance($to);

        self::assertEqualsWithDelta($distance->getValue(), 500, 0.1);
    }

    public function testDistanceDifferentZoneSameCRS(): void
    {
        $from = new UTMPoint(new Metre(630084), new Metre(4833439), 32, UTMPoint::HEMISPHERE_NORTH, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $to = new UTMPoint(new Metre(630584), new Metre(4833439), 33, UTMPoint::HEMISPHERE_NORTH, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $distance = $from->calculateDistance($to);

        self::assertEqualsWithDelta($distance->getValue(), 484511, 1);
    }
}

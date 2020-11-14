<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use DateTime;
use DateTimeImmutable;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use PHPUnit\Framework\TestCase;

class GeocentricPointTest extends TestCase
{
    public function testGeocentric(): void
    {
        $object = GeocentricPoint::create(new Metre(123), new Metre(456), new Metre(789), CoordinateReferenceSystem::fromEPSGCode(Geocentric::EPSG_WGS_84));
        self::assertEquals(123, $object->getX()->getValue());
        self::assertEquals(456, $object->getY()->getValue());
        self::assertEquals(789, $object->getZ()->getValue());
        self::assertEquals(4978, $object->getCRS()->getEpsgCode());
        self::assertNull($object->getCoordinateEpoch());
        self::assertEquals('(123, 456, 789)', $object->__toString());
    }

    public function testWithEpochDateTime(): void
    {
        $object = GeocentricPoint::create(new Metre(123), new Metre(456), new Metre(789), CoordinateReferenceSystem::fromEPSGCode(Geocentric::EPSG_WGS_84), new DateTime('2003-02-01'));
        self::assertEquals(123, $object->getX()->getValue());
        self::assertEquals(456, $object->getY()->getValue());
        self::assertEquals(789, $object->getZ()->getValue());
        self::assertEquals(4978, $object->getCRS()->getEpsgCode());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123, 456, 789)', $object->__toString());
    }

    public function testWithEpochDateTimeImmutable(): void
    {
        $object = GeocentricPoint::create(new Metre(123), new Metre(456), new Metre(789), CoordinateReferenceSystem::fromEPSGCode(Geocentric::EPSG_WGS_84), new DateTimeImmutable('2003-02-01'));
        self::assertEquals(123, $object->getX()->getValue());
        self::assertEquals(456, $object->getY()->getValue());
        self::assertEquals(789, $object->getZ()->getValue());
        self::assertEquals(4978, $object->getCRS()->getEpsgCode());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123, 456, 789)', $object->__toString());
    }

    public function testGeocentricWithFeetAsUnits(): void
    {
        $object = GeocentricPoint::create(UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), CoordinateReferenceSystem::fromEPSGCode(Geocentric::EPSG_WGS_84));
        self::assertEquals(37.4904, $object->getX()->getValue());
        self::assertEquals(37.4904, $object->getY()->getValue());
        self::assertEquals(37.4904, $object->getZ()->getValue());
    }

    public function testDistanceCalculation(): void
    {
        $from = GeocentricPoint::create(new Metre(12300), new Metre(45600), new Metre(78900), CoordinateReferenceSystem::fromEPSGCode(Geocentric::EPSG_WGS_84));
        $to = GeocentricPoint::create(new Metre(24600), new Metre(80200), new Metre(16800), CoordinateReferenceSystem::fromEPSGCode(Geocentric::EPSG_WGS_84));
        self::assertEqualsWithDelta(72144.715676, $from->calculateDistance($to)->getValue(), 0.000001);
    }
}

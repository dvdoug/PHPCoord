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
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use PHPUnit\Framework\TestCase;

class GeographicPointTest extends TestCase
{
    public function testGeographic2D(): void
    {
        $object = GeographicPoint::create(new Degree(0.123), new Degree(0.456), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84));
        self::assertEquals(0.123, $object->getLatitude()->getValue());
        self::assertEquals(0.456, $object->getLongitude()->getValue());
        self::assertNull($object->getHeight());
        self::assertEquals(4326, $object->getCRS()->getEpsgCode());
        self::assertNull($object->getCoordinateEpoch());
        self::assertEquals('(0.123, 0.456)', $object->__toString());
    }

    public function test2DWithEpochDateTime(): void
    {
        $object = GeographicPoint::create(new Degree(0.123), new Degree(0.456), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84), new DateTime('2003-02-01'));
        self::assertEquals(0.123, $object->getLatitude()->getValue());
        self::assertEquals(0.456, $object->getLongitude()->getValue());
        self::assertNull($object->getHeight());
        self::assertEquals(4326, $object->getCRS()->getEpsgCode());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(0.123, 0.456)', $object->__toString());
    }

    public function test2DWithEpochDateTimeImmutable(): void
    {
        $object = GeographicPoint::create(new Degree(0.123), new Degree(0.456), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84), new DateTimeImmutable('2003-02-01'));
        self::assertEquals(0.123, $object->getLatitude()->getValue());
        self::assertEquals(0.456, $object->getLongitude()->getValue());
        self::assertNull($object->getHeight());
        self::assertEquals(4326, $object->getCRS()->getEpsgCode());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(0.123, 0.456)', $object->__toString());
    }

    public function testGeographic2DWithRadianAsUnits(): void
    {
        $object = GeographicPoint::create(new Radian(0.123), new Radian(0.123), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84));
        self::assertEquals(7.047380880109133, $object->getLatitude()->getValue());
        self::assertEquals(7.047380880109133, $object->getLongitude()->getValue());
    }

    public function testGeographic2DWithHeight(): void
    {
        $this->expectException(InvalidCoordinateReferenceSystemException::class);
        $object = GeographicPoint::create(new Degree(0.123), new Degree(0.456), new Metre(789), CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84));
    }

    public function testGeographic3D(): void
    {
        $object = GeographicPoint::create(new Degree(0.123), new Degree(0.456), new Metre(789), CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84));
        self::assertEquals(0.123, $object->getLatitude()->getValue());
        self::assertEquals(0.456, $object->getLongitude()->getValue());
        self::assertEquals(789, $object->getHeight()->getValue());
        self::assertEquals(4979, $object->getCRS()->getEpsgCode());
        self::assertEquals('(0.123, 0.456, 789)', $object->__toString());
    }

    public function testGeographic3DWithRadianAndFeetAsUnits(): void
    {
        $object = GeographicPoint::create(new Radian(0.123), new Radian(0.123), UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84));
        self::assertEquals(7.047380880109133, $object->getLatitude()->getValue());
        self::assertEquals(7.047380880109133, $object->getLongitude()->getValue());
        self::assertEquals(37.4904, $object->getHeight()->getValue());
    }

    public function testGeographic3DWithoutHeight(): void
    {
        $this->expectException(InvalidCoordinateReferenceSystemException::class);
        $object = GeographicPoint::create(new Degree(0.123), new Degree(0.456), null, CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84));
    }

    public function testDistanceCalculation(): void
    {
        $from = GeographicPoint::create(new Degree(51.54105), new Degree(-0.12319), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84));
        $to = GeographicPoint::create(new Degree(51.507977), new Degree(-0.124588), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84));
        self::assertEqualsWithDelta(3679, $from->calculateDistance($to)->getValue(), 1);
    }
}

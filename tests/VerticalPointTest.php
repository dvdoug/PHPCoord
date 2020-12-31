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
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use PHPUnit\Framework\TestCase;

class VerticalPointTest extends TestCase
{
    public function testVertical(): void
    {
        $object = VerticalPoint::create(new Metre(123), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT));
        self::assertEquals(123, $object->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::3855', $object->getCRS()->getSrid());
        self::assertNull($object->getCoordinateEpoch());
        self::assertEquals('(123)', $object->__toString());
    }

    public function testVerticalWithEpochDateTime(): void
    {
        $object = VerticalPoint::create(new Metre(123), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT), new DateTime('2003-02-01'));
        self::assertEquals(123, $object->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::3855', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123)', $object->__toString());
    }

    public function testVerticalWithEpochDateTimeImmutable(): void
    {
        $object = VerticalPoint::create(new Metre(123), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT), new DateTimeImmutable('2003-02-01'));
        self::assertEquals(123, $object->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::3855', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123)', $object->__toString());
    }

    public function testVerticalWithFeetAsUnits(): void
    {
        $object = VerticalPoint::create(UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT));
        self::assertEquals(37.4904, $object->getHeight()->getValue());
    }

    public function testDistanceCalculation(): void
    {
        $from = VerticalPoint::create(new Metre(100), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT));
        $to = VerticalPoint::create(new Metre(80), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT));
        self::assertEqualsWithDelta(20, $from->calculateDistance($to)->getValue(), 0.000001);
    }
}

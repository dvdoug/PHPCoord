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
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\TestCase;

class CompoundPointTest extends TestCase
{
    public function testCompound(): void
    {
        $object = CompoundPoint::create(
            ProjectedPoint::create(new Metre(123), new Metre(456), null, null, Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR)),
            VerticalPoint::create(new Metre(789), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT)),
            Compound::fromSRID(Compound::EPSG_WGS_84_WORLD_MERCATOR_PLUS_EGM2008_HEIGHT)
        );
        self::assertEquals(123, $object->getHorizontalPoint()->getEasting()->getValue());
        self::assertEquals(456, $object->getHorizontalPoint()->getNorthing()->getValue());
        self::assertEquals(789, $object->getVerticalPoint()->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::6893', $object->getCRS()->getSrid());
        self::assertNull($object->getCoordinateEpoch());
        self::assertEquals('((123, 456), (789))', $object->__toString());
    }

    public function testCompoundWithEpochDateTime(): void
    {
        $object = CompoundPoint::create(
            ProjectedPoint::create(new Metre(123), new Metre(456), null, null, Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR)),
            VerticalPoint::create(new Metre(789), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT)),
            Compound::fromSRID(Compound::EPSG_WGS_84_WORLD_MERCATOR_PLUS_EGM2008_HEIGHT),
            new DateTime('2003-02-01')
        );
        self::assertEquals(123, $object->getHorizontalPoint()->getEasting()->getValue());
        self::assertEquals(456, $object->getHorizontalPoint()->getNorthing()->getValue());
        self::assertEquals(789, $object->getVerticalPoint()->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::6893', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('((123, 456), (789))', $object->__toString());
    }

    public function testCompoundWithEpochDateTimeImmutable(): void
    {
        $object = CompoundPoint::create(
            ProjectedPoint::create(new Metre(123), new Metre(456), null, null, Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR)),
            VerticalPoint::create(new Metre(789), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT)),
            Compound::fromSRID(Compound::EPSG_WGS_84_WORLD_MERCATOR_PLUS_EGM2008_HEIGHT),
            new DateTimeImmutable('2003-02-01')
        );
        self::assertEquals(123, $object->getHorizontalPoint()->getEasting()->getValue());
        self::assertEquals(456, $object->getHorizontalPoint()->getNorthing()->getValue());
        self::assertEquals(789, $object->getVerticalPoint()->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::6893', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('((123, 456), (789))', $object->__toString());
    }

    public function testDistanceCalculation(): void
    {
        $from = CompoundPoint::create(
            ProjectedPoint::create(new Metre(438700), new Metre(114800), null, null, Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR)),
            VerticalPoint::create(new Metre(789), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT)),
            Compound::fromSRID(Compound::EPSG_WGS_84_WORLD_MERCATOR_PLUS_EGM2008_HEIGHT)
        );
        $to = CompoundPoint::create(
            ProjectedPoint::create(new Metre(533600), new Metre(180500), null, null, Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR)),
            VerticalPoint::create(new Metre(789), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT)),
            Compound::fromSRID(Compound::EPSG_WGS_84_WORLD_MERCATOR_PLUS_EGM2008_HEIGHT)
        );
        self::assertEqualsWithDelta(115423.134596, $from->calculateDistance($to)->getValue(), 0.000001);
    }

    public function testDistanceDifferentCRS(): void
    {
        $this->expectException(InvalidCoordinateReferenceSystemException::class);
        $from = CompoundPoint::create(
            ProjectedPoint::create(new Metre(438700), new Metre(114800), null, null, Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR)),
            VerticalPoint::create(new Metre(789), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT)),
            Compound::fromSRID(Compound::EPSG_WGS_84_WORLD_MERCATOR_PLUS_EGM2008_HEIGHT)
        );
        $to = CompoundPoint::create(
            ProjectedPoint::create(new Metre(533600), new Metre(180500), null, null, Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR)),
            VerticalPoint::create(new Metre(789), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT)),
            Compound::fromSRID(Compound::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID_PLUS_ODN_HEIGHT)
        );
        $from->calculateDistance($to);
    }
}

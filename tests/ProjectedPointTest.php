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
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use PHPUnit\Framework\TestCase;

class ProjectedPointTest extends TestCase
{
    public function testEastingNorthing(): void
    {
        $object = ProjectedPoint::createFromEastingNorthing(new Metre(123), new Metre(456), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_WGS_84_WORLD_MERCATOR));
        self::assertEquals(123, $object->getEasting()->getValue());
        self::assertEquals(456, $object->getNorthing()->getValue());
        self::assertEquals(3395, $object->getCRS()->getEpsgCode());
        self::assertNull($object->getCoordinateEpoch());
        self::assertEquals('(123, 456)', $object->__toString());
    }

    public function testEastingNorthingWithEpochDateTime(): void
    {
        $object = ProjectedPoint::createFromEastingNorthing(new Metre(123), new Metre(456), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_WGS_84_WORLD_MERCATOR), new DateTime('2003-02-01'));
        self::assertEquals(123, $object->getEasting()->getValue());
        self::assertEquals(456, $object->getNorthing()->getValue());
        self::assertEquals(3395, $object->getCRS()->getEpsgCode());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123, 456)', $object->__toString());
    }

    public function testEastingNorthingWithEpochDateTimeImmutable(): void
    {
        $object = ProjectedPoint::createFromEastingNorthing(new Metre(123), new Metre(456), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_WGS_84_WORLD_MERCATOR), new DateTimeImmutable('2003-02-01'));
        self::assertEquals(123, $object->getEasting()->getValue());
        self::assertEquals(456, $object->getNorthing()->getValue());
        self::assertEquals(3395, $object->getCRS()->getEpsgCode());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123, 456)', $object->__toString());
    }

    public function testWithFeetAsUnitsEastingNorthing(): void
    {
        $object = ProjectedPoint::createFromEastingNorthing(UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_WGS_84_WORLD_MERCATOR));
        self::assertEquals(37.4904, $object->getEasting()->getValue());
        self::assertEquals(37.4904, $object->getNorthing()->getValue());
    }

    public function testDistanceCalculationEastingNorthing(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(438700), new Metre(114800), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_WGS_84_WORLD_MERCATOR));
        $to = ProjectedPoint::createFromEastingNorthing(new Metre(533600), new Metre(180500), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_WGS_84_WORLD_MERCATOR));
        self::assertEqualsWithDelta(115423.134596, $from->calculateDistance($to)->getValue(), 0.000001);
    }

    public function testDistanceDifferentCRSEastingNorthing(): void
    {
        $this->expectException(InvalidCoordinateReferenceSystemException::class);
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(438700), new Metre(114800), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_WGS_84_WORLD_MERCATOR));
        $to = ProjectedPoint::createFromEastingNorthing(new Metre(533600), new Metre(180500), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID));
        $from->calculateDistance($to);
    }

    public function testWestingNorthing(): void
    {
        $object = ProjectedPoint::createFromWestingNorthing(new Metre(123), new Metre(456), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_ETRS89_FAROE_LAMBERT));
        self::assertEquals(123, $object->getWesting()->getValue());
        self::assertEquals(456, $object->getNorthing()->getValue());
        self::assertEquals(3145, $object->getCRS()->getEpsgCode());
        self::assertEquals('(456, 123)', $object->__toString());
    }

    public function testWithFeetAsUnitsWestingNorthing(): void
    {
        $object = ProjectedPoint::createFromWestingNorthing(UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_ETRS89_FAROE_LAMBERT));
        self::assertEquals(37.4904, $object->getWesting()->getValue());
        self::assertEquals(37.4904, $object->getNorthing()->getValue());
    }

    public function testDistanceCalculationWestingNorthing(): void
    {
        $from = ProjectedPoint::createFromWestingNorthing(new Metre(438700), new Metre(114800), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_ETRS89_FAROE_LAMBERT));
        $to = ProjectedPoint::createFromWestingNorthing(new Metre(533600), new Metre(180500), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_ETRS89_FAROE_LAMBERT));
        self::assertEqualsWithDelta(115423.134596, $from->calculateDistance($to)->getValue(), 0.000001);
    }

    public function testDistanceDifferentCRSWestingNorthing(): void
    {
        $this->expectException(InvalidCoordinateReferenceSystemException::class);
        $from = ProjectedPoint::createFromWestingNorthing(new Metre(438700), new Metre(114800), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_ETRS89_FAROE_LAMBERT));
        $to = ProjectedPoint::createFromEastingNorthing(new Metre(533600), new Metre(180500), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID));
        $from->calculateDistance($to);
    }

    public function testWestingSouthing(): void
    {
        $object = ProjectedPoint::createFromWestingSouthing(new Metre(123), new Metre(456), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_ST_STEPHEN_GRID_FERRO));
        self::assertEquals(123, $object->getWesting()->getValue());
        self::assertEquals(456, $object->getSouthing()->getValue());
        self::assertEquals(8045, $object->getCRS()->getEpsgCode());
        self::assertEquals('(456, 123)', $object->__toString());
    }

    public function testWithFeetAsUnitsWestingSouthing(): void
    {
        $object = ProjectedPoint::createFromWestingSouthing(UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_ST_STEPHEN_GRID_FERRO));
        self::assertEquals(37.4904, $object->getWesting()->getValue());
        self::assertEquals(37.4904, $object->getSouthing()->getValue());
    }

    public function testDistanceCalculationWestingSouthing(): void
    {
        $from = ProjectedPoint::createFromWestingSouthing(new Metre(438700), new Metre(114800), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_ST_STEPHEN_GRID_FERRO));
        $to = ProjectedPoint::createFromWestingSouthing(new Metre(533600), new Metre(180500), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_ST_STEPHEN_GRID_FERRO));
        self::assertEqualsWithDelta(115423.134596, $from->calculateDistance($to)->getValue(), 0.000001);
    }

    public function testDistanceDifferentCRSWestingSouthing(): void
    {
        $this->expectException(InvalidCoordinateReferenceSystemException::class);
        $from = ProjectedPoint::createFromWestingSouthing(new Metre(438700), new Metre(114800), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_ST_STEPHEN_GRID_FERRO));
        $to = ProjectedPoint::createFromEastingNorthing(new Metre(533600), new Metre(180500), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID));
        $from->calculateDistance($to);
    }
}

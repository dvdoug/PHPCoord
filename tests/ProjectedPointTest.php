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
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Coefficient;
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

    public function testAffineParametricTransformEastingNorthing(): void
    {
        $from = ProjectedPoint::create(UnitOfMeasureFactory::makeUnit(553900, UnitOfMeasure::EPSG_LENGTH_CLARKE_S_FOOT), UnitOfMeasureFactory::makeUnit(482500, UnitOfMeasure::EPSG_LENGTH_CLARKE_S_FOOT), null, null, CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_JAMAICA_1875_JAMAICA_OLD_GRID));
        $to = $from->affineParametricTransform(CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_JAD69_JAMAICA_NATIONAL_GRID), new Metre(82357.457), new Coefficient(0.304794369), new Coefficient(0.000015417425), new Metre(28091.324), new Coefficient(-0.000015417425), new Coefficient(0.304794369), false);
        self::assertEqualsWithDelta(251190.497, $to->getEasting()->asMetres()->getValue(), 0.001);
        self::assertEqualsWithDelta(175146.067, $to->getNorthing()->asMetres()->getValue(), 0.001);
    }

    public function testAlbersEqualAreaNorthHemisphere(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(1466493.492), new Metre(702903.006), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_NAD83_GREAT_LAKES_ALBERS));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_NAD83);
        $to = $from->albersEqualArea($toCRS, new Degree(45.568977), new Degree(-84.455955), new Degree(42.122774), new Degree(49.01518), new Metre(1000000), new Metre(1000000));

        self::assertEqualsWithDelta(0.746128255, $to->getLatitude()->asRadians()->getValue(), 0.000001);
        self::assertEqualsWithDelta(-1.374446786, $to->getLongitude()->asRadians()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function testAlbersEqualAreaSouthHemisphere(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(1408623.196), new Metre(1507641.482), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_TWD67_TM2_ZONE_119));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_TWD67);
        $to = $from->albersEqualArea($toCRS, new Degree(-32), new Degree(-60), new Degree(-5), new Degree(-42), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(-0.322895686, $to->getLatitude()->asRadians()->getValue(), 0.000001);
        self::assertEqualsWithDelta(-0.802858912, $to->getLongitude()->asRadians()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function testAmericanPolyconic(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(1776784.5), new Metre(1319677.8), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_NAD27_ALABAMA_EAST));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_NAD27);
        $to = $from->americanPolyconic($toCRS, new Degree(30), new Degree(-96), new Metre(10), new Metre(20));

        self::assertEqualsWithDelta(40, $to->getLatitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(-75, $to->getLongitude()->getValue(), 0.0001);
        self::assertNull($to->getHeight());
    }

    public function testBonneNorthHemisphere(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(-962905.1), new Metre(-1056045.0), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_NAD27_ALABAMA_EAST));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_NAD27);
        $to = $from->bonne($toCRS, new Degree(40), new Degree(-75), new Metre(10), new Metre(20));

        self::assertEqualsWithDelta(30, $to->getLatitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(-85, $to->getLongitude()->getValue(), 0.0001);
        self::assertNull($to->getHeight());
    }

    public function testBonneSouthHemisphere(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(-962925.1), new Metre(-1056085.0), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_NAD27_ALABAMA_EAST));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_NAD27);
        $to = $from->bonneSouthOrientated($toCRS, new Degree(40), new Degree(-75), new Metre(10), new Metre(20));

        self::assertEqualsWithDelta(30, $to->getLatitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(-85, $to->getLongitude()->getValue(), 0.0001);
        self::assertNull($to->getHeight());
    }
}

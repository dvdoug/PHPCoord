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
use PHPCoord\CoordinateSystem\CoordinateSystem;
use PHPCoord\Datum\Datum;
use PHPCoord\Datum\Ellipsoid;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Radian;
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

    public function testOffsets(): void
    {
        $from = ProjectedPoint::create(new Metre(100), new Metre(200), null, null, CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_JAMAICA_1875_JAMAICA_OLD_GRID));
        $to = $from->offsets(CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_JAD69_JAMAICA_NATIONAL_GRID), new Metre(40), new Metre(60));
        self::assertEquals(140, $to->getEasting()->asMetres()->getValue());
        self::assertEquals(260, $to->getNorthing()->asMetres()->getValue());
    }

    public function testCassiniSoldner(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(UnitOfMeasureFactory::makeUnit(66644.94, UnitOfMeasure::EPSG_LENGTH_CLARKE_S_LINK), UnitOfMeasureFactory::makeUnit(82536.22, UnitOfMeasure::EPSG_LENGTH_CLARKE_S_LINK), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_TRINIDAD_1903_TRINIDAD_GRID));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_TRINIDAD_1903);
        $to = $from->cassiniSoldner($toCRS, new Radian(0.182241463), new Radian(-1.070468608), UnitOfMeasureFactory::makeUnit(430000, UnitOfMeasure::EPSG_LENGTH_CLARKE_S_LINK), UnitOfMeasureFactory::makeUnit(325000, UnitOfMeasure::EPSG_LENGTH_CLARKE_S_LINK));

        self::assertEqualsWithDelta(10, $to->getLatitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(-62, $to->getLongitude()->getValue(), 0.0001);
        self::assertNull($to->getHeight());
    }

    public function testColumbiaUrban(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(80859.033), new Metre(122543.174), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_MAGNA_SIRGAS_BOGOTA_URBAN_GRID));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_MAGNA_SIRGAS);
        $to = $from->columbiaUrban($toCRS, new Radian(0.081689893), new Radian(-1.294102154), new Metre(92334.879), new Metre(109320.965), new Metre(2550));

        self::assertEqualsWithDelta(0.083775804, $to->getLatitude()->asRadians()->getValue(), 0.0001);
        self::assertEqualsWithDelta(-1.295906970, $to->getLongitude()->asRadians()->getValue(), 0.0001);
        self::assertNull($to->getHeight());
    }

    public function testEqualEarth(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(-2390749.042), new Metre(4242849.758), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_WGS_84_EQUAL_EARTH_AMERICAS));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84);
        $to = $from->equalEarth($toCRS, new Degree(-90), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(0.5944163293, $to->getLatitude()->asRadians()->getValue(), 0.0000000001);
        self::assertEqualsWithDelta(-2.0454693977, $to->getLongitude()->asRadians()->getValue(), 0.000000001);
        self::assertNull($to->getHeight());
    }

    public function testEquidistantCylindrical(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(1113194.91), new Metre(6097230.31), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_WGS_84_WORLD_EQUIDISTANT_CYLINDRICAL));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84);
        $to = $from->equidistantCylindrical($toCRS, new Degree(0), new Degree(0), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(55, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(10, $to->getLongitude()->getValue(), 0.0000001);
        self::assertNull($to->getHeight());
    }

    public function testGuamProjection(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(37712.48), new Metre(35242.00), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_GUAM_1963_GUAM_SPCS));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_GUAM_1963);
        $to = $from->guamProjection($toCRS, new Radian(0.235138896), new Radian(2.526342288), new Metre(50000), new Metre(50000));

        self::assertEqualsWithDelta(0.232810140, $to->getLatitude()->asRadians()->getValue(), 0.001);
        self::assertEqualsWithDelta(2.524362746, $to->getLongitude()->asRadians()->getValue(), 0.001);
        self::assertNull($to->getHeight());
    }

    public function testHyperbolicCassiniSoldner(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(UnitOfMeasureFactory::makeUnit(1601528.9, UnitOfMeasure::EPSG_LENGTH_LINK), UnitOfMeasureFactory::makeUnit(1336966.6, UnitOfMeasure::EPSG_LENGTH_LINK), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_VANUA_LEVU_1915_VANUA_LEVU_GRID));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_VANUA_LEVU_1915);
        $to = $from->hyperbolicCassiniSoldner($toCRS, new Radian(-0.283616003), new Radian(3.129957125), UnitOfMeasureFactory::makeUnit(12513.318, UnitOfMeasure::EPSG_LENGTH_CHAIN), UnitOfMeasureFactory::makeUnit(16628.885, UnitOfMeasure::EPSG_LENGTH_CHAIN));

        self::assertEqualsWithDelta(-0.293938867, $to->getLatitude()->asRadians()->getValue(), 0.0001);
        self::assertEqualsWithDelta(3.141493807, $to->getLongitude()->asRadians()->getValue(), 0.0001);
        self::assertNull($to->getHeight());
    }

    public function testKrovak(): void
    {
        $from = ProjectedPoint::createFromWestingSouthing(new Metre(568991.00), new Metre(1050538.64), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_S_JTSK_FERRO_KROVAK));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_S_JTSK);
        $to = $from->krovak($toCRS, new Radian(0.863937979), new Radian(0.741764932), new Radian(0.528627763), new Radian(1.370083463), new Coefficient(0.9999), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(50.20901167, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(16.84977194, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testKrovakNorthOrientated(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(-568991.00), new Metre(-1050538.64), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_S_JTSK_FERRO_KROVAK_EAST_NORTH));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_S_JTSK);
        $to = $from->krovak($toCRS, new Radian(0.863937979), new Radian(0.741764932), new Radian(0.528627763), new Radian(1.370083463), new Coefficient(0.9999), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(50.20901167, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(16.84977194, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testKrovakModified(): void
    {
        $from = ProjectedPoint::createFromWestingSouthing(new Metre(5568990.91), new Metre(6050538.71), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_S_JTSK_05_FERRO_MODIFIED_KROVAK));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_S_JTSK_05);
        $to = $from->krovakModified($toCRS, new Radian(0.863937979), new Radian(0.741764932), new Radian(0.528627763), new Radian(1.370083463), new Coefficient(0.9999), new Metre(5000000), new Metre(5000000), new Metre(1089000), new Metre(654000), new Coefficient(2.946529277E-02), new Coefficient(2.515965696E-02), new Coefficient(1.193845912E-07), new Coefficient(-4.668270147E-07), new Coefficient(9.233980362E-12), new Coefficient(1.523735715E-12), new Coefficient(1.696780024E-18), new Coefficient(4.408314235E-18), new Coefficient(-8.331083518E-24), new Coefficient(-3.689471323E-24));

        self::assertEqualsWithDelta(50.20901167, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(16.84977194, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testKrovakModifiedNorthOrientated(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(-5568990.91), new Metre(-6050538.71), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_S_JTSK_05_FERRO_MODIFIED_KROVAK_EAST_NORTH));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_S_JTSK_05);
        $to = $from->krovakModified($toCRS, new Radian(0.863937979), new Radian(0.741764932), new Radian(0.528627763), new Radian(1.370083463), new Coefficient(0.9999), new Metre(5000000), new Metre(5000000), new Metre(1089000), new Metre(654000), new Coefficient(2.946529277E-02), new Coefficient(2.515965696E-02), new Coefficient(1.193845912E-07), new Coefficient(-4.668270147E-07), new Coefficient(9.233980362E-12), new Coefficient(1.523735715E-12), new Coefficient(1.696780024E-18), new Coefficient(4.408314235E-18), new Coefficient(-8.331083518E-24), new Coefficient(-3.689471323E-24));

        self::assertEqualsWithDelta(50.20901167, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(16.84977194, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testLambertAzimuthalEqualArea(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(3962799.45), new Metre(2999718.85), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_ETRS89_EXTENDED_LAEA_EUROPE));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_ETRS89);
        $to = $from->lambertAzimuthalEqualArea($toCRS, new Degree(52), new Degree(10), new Metre(4321000), new Metre(3210000));

        self::assertEqualsWithDelta(50, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(5, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testLambertAzimuthalEqualAreaSpherical(): void
    {
        $fromCRS = new Projected(
            0,
            CoordinateSystem::fromEPSGCode(4400),
            new Geographic2D(
                0,
                CoordinateSystem::fromEPSGCode(6422),
                new Datum(
                    Datum::DATUM_TYPE_GEODETIC,
                    new Ellipsoid(
                        new Metre(3),
                        new Metre(3)
                    ),
                    null,
                    null
                )
            )
        );
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(-3.2339303), new Metre(6.0257775), $fromCRS);

        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84);
        $to = $from->lambertAzimuthalEqualAreaSpherical($toCRS, new Degree(40), new Degree(-100), new Metre(1), new Metre(2));

        self::assertEqualsWithDelta(-20, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(100, $to->getLongitude()->getValue(), 0.000001);
    }

    public function testLambertConicConformal1SP(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(255966.59), new Metre(142493.51), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_JAD69_JAMAICA_NATIONAL_GRID));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_JAD69);
        $to = $from->lambertConicConformal1SP($toCRS, new Degree(18), new Degree(-77), new Coefficient(1), new Metre(250000), new Metre(150000));

        self::assertEqualsWithDelta(0.31297535, $to->getLatitude()->asRadians()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(-1.34292061, $to->getLongitude()->asRadians()->getValue(), 0.0000001);
    }

    public function testLambertConicConformal2SP(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(UnitOfMeasureFactory::makeUnit(2963503.95, UnitOfMeasure::EPSG_LENGTH_US_SURVEY_FOOT), UnitOfMeasureFactory::makeUnit(254759.84, UnitOfMeasure::EPSG_LENGTH_US_SURVEY_FOOT), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_NAD27_TEXAS_SOUTH_CENTRAL));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_NAD27);
        $to = $from->lambertConicConformal2SP($toCRS, new Radian(0.48578331), new Radian(-1.72787596), new Radian(0.49538262), new Radian(0.52854388), UnitOfMeasureFactory::makeUnit(2000000, UnitOfMeasure::EPSG_LENGTH_US_SURVEY_FOOT), new Metre(0));

        self::assertEqualsWithDelta(0.49741884, $to->getLatitude()->asRadians()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(-1.67551608, $to->getLongitude()->asRadians()->getValue(), 0.0000001);
    }

    public function testLambertConicConformal2SPMichigan(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(UnitOfMeasureFactory::makeUnit(2308335.75, UnitOfMeasure::EPSG_LENGTH_US_SURVEY_FOOT), UnitOfMeasureFactory::makeUnit(160210.49, UnitOfMeasure::EPSG_LENGTH_US_SURVEY_FOOT), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_NAD27_MICHIGAN_CENTRAL));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_NAD27);
        $to = $from->lambertConicConformal2SPMichigan($toCRS, new Radian(0.756018454), new Radian(-1.471894336), new Radian(0.771144641), new Radian(0.797615468), UnitOfMeasureFactory::makeUnit(2000000, UnitOfMeasure::EPSG_LENGTH_US_SURVEY_FOOT), new Metre(0), new Coefficient(1.0000382));

        self::assertEqualsWithDelta(0.763581548, $to->getLatitude()->asRadians()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(-1.451532161, $to->getLongitude()->asRadians()->getValue(), 0.0000001);
    }

    public function testLambertConicConformal2SPBelgium(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(251763.20), new Metre(153034.10), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_BELGE_1972_BELGE_LAMBERT_72));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_BELGE_1972);
        $to = $from->lambertConicConformal2SPBelgium($toCRS, new Radian(1.57079633), new Radian(0.07604294), new Radian(0.86975574), new Radian(0.89302680), new Metre(150000.01), new Metre(5400088.44));

        self::assertEqualsWithDelta(0.88452540, $to->getLatitude()->asRadians()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(0.10135773, $to->getLongitude()->asRadians()->getValue(), 0.0000001);
    }

    public function testLambertConicNearConformal(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(15707.96), new Metre(623165.96), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_DEIR_EZ_ZOR_LEVANT_ZONE));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_DEIR_EZ_ZOR);
        $to = $from->lambertConicNearConformal($toCRS, new Radian(0.604756586), new Radian(0.651880476), new Coefficient(0.99962560), new Metre(300000), new Metre(300000));

        self::assertEqualsWithDelta(0.654874806, $to->getLatitude()->asRadians()->getValue(), 0.000000001);
        self::assertEqualsWithDelta(0.595793792, $to->getLongitude()->asRadians()->getValue(), 0.000000001);
    }

    public function testLambertCylindricalEqualArea(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(-332699.8), new Metre(1104391.2), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_DEIR_EZ_ZOR_LEVANT_ZONE));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_DEIR_EZ_ZOR);
        $to = $from->lambertCylindricalEqualArea($toCRS, new Degree(5), new Degree(-75), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(10, $to->getLatitude()->getValue(), 0.001);
        self::assertEqualsWithDelta(-78, $to->getLongitude()->getValue(), 0.001);
    }

    public function testModifiedAzimuthalEquidistant(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(42665.90), new Metre(65509.82), CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_GUAM_1963_YAP_ISLANDS));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_GUAM_1963);
        $to = $from->modifiedAzimuthalEquidistant($toCRS, new Radian(0.166621493), new Radian(2.411499514), new Metre(40000), new Metre(60000));

        self::assertEqualsWithDelta(0.167490973, $to->getLatitude()->asRadians()->getValue(), 0.000000001);
        self::assertEqualsWithDelta(2.411923377, $to->getLongitude()->asRadians()->getValue(), 0.000000001);
    }
}

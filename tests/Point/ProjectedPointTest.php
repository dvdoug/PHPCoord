<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use DateTime;
use DateTimeImmutable;
use PHPCoord\CoordinateOperation\OSTN15OSGM15Provider;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\ProjectedSRIDData;
use PHPCoord\CoordinateSystem\Cartesian;
use PHPCoord\Datum\Datum;
use PHPCoord\Datum\Ellipsoid;
use PHPCoord\Exception\InvalidAxesException;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Geometry\BoundingArea;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Grad;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\ClarkeFoot;
use PHPCoord\UnitOfMeasure\Length\ClarkeLink;
use PHPCoord\UnitOfMeasure\Length\Foot;
use PHPCoord\UnitOfMeasure\Length\Link;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Length\USSurveyFoot;
use PHPCoord\UnitOfMeasure\Scale\Coefficient;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

use function class_exists;

class ProjectedPointTest extends TestCase
{
    use ProjectedSRIDData;

    public function testEastingNorthing(): void
    {
        $object = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR), new Metre(123), new Metre(456));
        self::assertEquals(123, $object->getEasting()->getValue());
        self::assertEquals(456, $object->getNorthing()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::3395', $object->getCRS()->getSrid());
        self::assertNull($object->getCoordinateEpoch());
        self::assertEquals('(123, 456)', $object->__toString());
    }

    public function testEastingNorthingWithEpochDateTime(): void
    {
        $object = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR), new Metre(123), new Metre(456), new DateTime('2003-02-01'));
        self::assertEquals(123, $object->getEasting()->getValue());
        self::assertEquals(456, $object->getNorthing()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::3395', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123, 456)', $object->__toString());
    }

    public function testEastingNorthingWithEpochDateTimeImmutable(): void
    {
        $object = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR), new Metre(123), new Metre(456), new DateTimeImmutable('2003-02-01'));
        self::assertEquals(123, $object->getEasting()->getValue());
        self::assertEquals(456, $object->getNorthing()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::3395', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123, 456)', $object->__toString());
    }

    public function testWithFeetAsUnitsEastingNorthing(): void
    {
        $object = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR), new Foot(123), new Foot(123));
        self::assertEquals(37.4904, $object->getEasting()->getValue());
        self::assertEquals(37.4904, $object->getNorthing()->getValue());
    }

    #[Group('distance')]
    public function testDistanceCalculationEastingNorthing(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR), new Metre(438700), new Metre(114800));
        $to = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR), new Metre(533600), new Metre(180500));
        self::assertEqualsWithDelta(115423.134596, $from->calculateDistance($to)->getValue(), 0.000001);
    }

    #[Group('distance')]
    public function testDistanceDifferentCRSEastingNorthing(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR), new Metre(438700), new Metre(114800));
        $to = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_PSEUDO_MERCATOR), new Metre(533600), new Metre(180500));
        self::assertEqualsWithDelta(114739.81913, $from->calculateDistance($to)->getValue(), 0.000001);
    }

    #[Group('distance')]
    public function testDistanceDifferentCRSNoAutoconversion(): void
    {
        $this->expectException(InvalidCoordinateReferenceSystemException::class);
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_CGCS2000_3_DEGREE_GAUSS_KRUGER_CM_75E), new Metre(438700), new Metre(114800));
        $to = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID), new Metre(533600), new Metre(180500));
        $from->calculateDistance($to);
    }

    public function testWestingNorthing(): void
    {
        $object = ProjectedPoint::createFromWestingNorthing(Projected::fromSRID(Projected::EPSG_ETRS89_FAROE_LAMBERT), new Metre(123), new Metre(456));
        self::assertEquals(123, $object->getWesting()->getValue());
        self::assertEquals(456, $object->getNorthing()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::3145', $object->getCRS()->getSrid());
        self::assertEquals('(456, 123)', $object->__toString());
    }

    public function testWithFeetAsUnitsWestingNorthing(): void
    {
        $object = ProjectedPoint::createFromWestingNorthing(Projected::fromSRID(Projected::EPSG_ETRS89_FAROE_LAMBERT), new Foot(123), new Foot(123));
        self::assertEquals(37.4904, $object->getWesting()->getValue());
        self::assertEquals(37.4904, $object->getNorthing()->getValue());
    }

    #[Group('distance')]
    public function testDistanceCalculationWestingNorthing(): void
    {
        $from = ProjectedPoint::createFromWestingNorthing(Projected::fromSRID(Projected::EPSG_ETRS89_FAROE_LAMBERT), new Metre(438700), new Metre(114800));
        $to = ProjectedPoint::createFromWestingNorthing(Projected::fromSRID(Projected::EPSG_ETRS89_FAROE_LAMBERT), new Metre(533600), new Metre(180500));
        self::assertEqualsWithDelta(115423.134596, $from->calculateDistance($to)->getValue(), 0.000001);
    }

    public function testWestingSouthing(): void
    {
        $object = ProjectedPoint::createFromWestingSouthing(Projected::fromSRID(Projected::EPSG_ST_STEPHEN_GRID_FERRO), new Metre(123), new Metre(456));
        self::assertEquals(123, $object->getWesting()->getValue());
        self::assertEquals(456, $object->getSouthing()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::8045', $object->getCRS()->getSrid());
        self::assertEquals('(456, 123)', $object->__toString());
    }

    public function testWithFeetAsUnitsWestingSouthing(): void
    {
        $object = ProjectedPoint::createFromWestingSouthing(Projected::fromSRID(Projected::EPSG_ST_STEPHEN_GRID_FERRO), new Foot(123), new Foot(123));
        self::assertEquals(37.4904, $object->getWesting()->getValue());
        self::assertEquals(37.4904, $object->getSouthing()->getValue());
    }

    #[Group('distance')]
    public function testDistanceCalculationWestingSouthing(): void
    {
        $from = ProjectedPoint::createFromWestingSouthing(Projected::fromSRID(Projected::EPSG_ST_STEPHEN_GRID_FERRO), new Metre(438700), new Metre(114800));
        $to = ProjectedPoint::createFromWestingSouthing(Projected::fromSRID(Projected::EPSG_ST_STEPHEN_GRID_FERRO), new Metre(533600), new Metre(180500));
        self::assertEqualsWithDelta(115423.134596, $from->calculateDistance($to)->getValue(), 0.000001);
    }

    public function testNoWestingWhenExpected(): void
    {
        $this->expectException(InvalidAxesException::class);
        $this->expectExceptionMessage('This CRS has axes: Southing, Westing');
        $object = ProjectedPoint::create(Projected::fromSRID(Projected::EPSG_ST_STEPHEN_GRID_FERRO), null, new Metre(123), null, null);
    }

    public function testNoSouthingWhenExpected(): void
    {
        $this->expectException(InvalidAxesException::class);
        $this->expectExceptionMessage('This CRS has axes: Southing, Westing');
        $object = ProjectedPoint::create(Projected::fromSRID(Projected::EPSG_ST_STEPHEN_GRID_FERRO), null, null, new Metre(123), null);
    }

    public function testCanCreateBritishNationalGridObject(): void
    {
        $object = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID), new Metre(100), new Metre(200));
        self::assertInstanceOf(BritishNationalGridPoint::class, $object);
    }

    public function testCanCreateIrishGridObject(): void
    {
        $object = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_TM75_IRISH_GRID), new Metre(100), new Metre(200));
        self::assertInstanceOf(IrishGridPoint::class, $object);
    }

    public function testCanCreateITMObject(): void
    {
        $object = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_IRENET95_IRISH_TRANSVERSE_MERCATOR), new Metre(100), new Metre(200));
        self::assertInstanceOf(IrishTransverseMercatorPoint::class, $object);
    }

    public function testAffineParametricTransformEastingNorthing(): void
    {
        $from = ProjectedPoint::create(Projected::fromSRID(Projected::EPSG_JAMAICA_1875_JAMAICA_OLD_GRID), new ClarkeFoot(553900), new ClarkeFoot(482500), null, null);
        $to = $from->affineParametricTransform(Projected::fromSRID(Projected::EPSG_JAD69_JAMAICA_NATIONAL_GRID), new Metre(82357.457), new Coefficient(0.304794369), new Coefficient(0.000015417425), new Metre(28091.324), new Coefficient(-0.000015417425), new Coefficient(0.304794369), false);
        self::assertEqualsWithDelta(251190.497, $to->getEasting()->asMetres()->getValue(), 0.001);
        self::assertEqualsWithDelta(175146.067, $to->getNorthing()->asMetres()->getValue(), 0.001);
    }

    public function testAlbersEqualAreaNorthHemisphere(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_NAD83_GREAT_LAKES_ALBERS), new Metre(1466493.492), new Metre(702903.006));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_NAD83);
        $to = $from->albersEqualArea($toCRS, new Degree(45.568977), new Degree(-84.455955), new Degree(42.122774), new Degree(49.01518), new Metre(1000000), new Metre(1000000));

        self::assertEqualsWithDelta(0.746128255, $to->getLatitude()->asRadians()->getValue(), 0.000001);
        self::assertEqualsWithDelta(-1.374446786, $to->getLongitude()->asRadians()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function testAlbersEqualAreaSouthHemisphere(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID('urn:ogc:def:crs:EPSG::3827'), new Metre(1408623.196), new Metre(1507641.482));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_TWD67);
        $to = $from->albersEqualArea($toCRS, new Degree(-32), new Degree(-60), new Degree(-5), new Degree(-42), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(-0.322895686, $to->getLatitude()->asRadians()->getValue(), 0.000001);
        self::assertEqualsWithDelta(-0.802858912, $to->getLongitude()->asRadians()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function testAmericanPolyconic(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_NAD27_ALABAMA_EAST), new Metre(1776784.5), new Metre(1319677.8));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_NAD27);
        $to = $from->americanPolyconic($toCRS, new Degree(30), new Degree(-96), new Metre(10), new Metre(20));

        self::assertEqualsWithDelta(40, $to->getLatitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(-75, $to->getLongitude()->getValue(), 0.0001);
        self::assertNull($to->getHeight());
    }

    public function testBonneNorthHemisphere(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_NAD27_ALABAMA_EAST), new Metre(-962905.1), new Metre(-1056045.0));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_NAD27);
        $to = $from->bonne($toCRS, new Degree(40), new Degree(-75), new Metre(10), new Metre(20));

        self::assertEqualsWithDelta(30, $to->getLatitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(-85, $to->getLongitude()->getValue(), 0.0001);
        self::assertNull($to->getHeight());
    }

    public function testBonneSouthHemisphere(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_NAD27_ALABAMA_EAST), new Metre(-962925.1), new Metre(-1056085.0));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_NAD27);
        $to = $from->bonneSouthOrientated($toCRS, new Degree(40), new Degree(-75), new Metre(10), new Metre(20));

        self::assertEqualsWithDelta(30, $to->getLatitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(-85, $to->getLongitude()->getValue(), 0.0001);
        self::assertNull($to->getHeight());
    }

    public function testOffsets(): void
    {
        $from = ProjectedPoint::create(Projected::fromSRID(Projected::EPSG_JAMAICA_1875_JAMAICA_OLD_GRID), new Metre(100), new Metre(200), null, null);
        $to = $from->offsets(Projected::fromSRID(Projected::EPSG_JAD69_JAMAICA_NATIONAL_GRID), new Metre(40), new Metre(60));
        self::assertEquals(140, $to->getEasting()->asMetres()->getValue());
        self::assertEquals(260, $to->getNorthing()->asMetres()->getValue());
    }

    public function testCassiniSoldner(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_TRINIDAD_1903_TRINIDAD_GRID), new ClarkeLink(66644.94), new ClarkeLink(82536.22));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_TRINIDAD_1903);
        $to = $from->cassiniSoldner($toCRS, new Radian(0.182241463), new Radian(-1.070468608), new ClarkeLink(430000), new ClarkeLink(325000));

        self::assertEqualsWithDelta(10, $to->getLatitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(-62, $to->getLongitude()->getValue(), 0.0001);
        self::assertNull($to->getHeight());
    }

    public function testColumbiaUrban(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_MAGNA_SIRGAS_BOGOTA_URBAN_GRID), new Metre(80859.033), new Metre(122543.174));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_MAGNA_SIRGAS);
        $to = $from->columbiaUrban($toCRS, new Radian(0.081689893), new Radian(-1.294102154), new Metre(92334.879), new Metre(109320.965), new Metre(2550));

        self::assertEqualsWithDelta(0.083775804, $to->getLatitude()->asRadians()->getValue(), 0.0001);
        self::assertEqualsWithDelta(-1.295906970, $to->getLongitude()->asRadians()->getValue(), 0.0001);
        self::assertNull($to->getHeight());
    }

    public function testEqualEarth(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_EQUAL_EARTH_AMERICAS), new Metre(-2390749.042), new Metre(4242849.758));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->equalEarth($toCRS, new Degree(-90), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(0.5944163293, $to->getLatitude()->asRadians()->getValue(), 0.0000000001);
        self::assertEqualsWithDelta(-2.0454693977, $to->getLongitude()->asRadians()->getValue(), 0.000000001);
        self::assertNull($to->getHeight());
    }

    public function testEquidistantCylindrical(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_EQUIDISTANT_CYLINDRICAL), new Metre(1113194.91), new Metre(6097230.31));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->equidistantCylindrical($toCRS, new Degree(0), new Degree(0), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(55, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(10, $to->getLongitude()->getValue(), 0.0000001);
        self::assertNull($to->getHeight());
    }

    public function testGuamProjection(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_GUAM_1963_GUAM_SPCS), new Metre(37712.48), new Metre(35242.00));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_GUAM_1963);
        $to = $from->guamProjection($toCRS, new Radian(0.235138896), new Radian(2.526342288), new Metre(50000), new Metre(50000));

        self::assertEqualsWithDelta(0.232810140, $to->getLatitude()->asRadians()->getValue(), 0.001);
        self::assertEqualsWithDelta(2.524362746, $to->getLongitude()->asRadians()->getValue(), 0.001);
        self::assertNull($to->getHeight());
    }

    public function testHyperbolicCassiniSoldner(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_VANUA_LEVU_1915_VANUA_LEVU_GRID), new Link(1601528.9), new Link(1336966.6));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_VANUA_LEVU_1915);
        $to = $from->hyperbolicCassiniSoldner($toCRS, new Radian(-0.283616003), new Radian(3.129957125), new Link(12513.318 * 100), new Link(16628.885 * 100));

        self::assertEqualsWithDelta(-0.293938867, $to->getLatitude()->asRadians()->getValue(), 0.0001);
        self::assertEqualsWithDelta(3.141493807, $to->getLongitude()->asRadians()->getValue(), 0.0001);
        self::assertNull($to->getHeight());
    }

    public function testKrovak(): void
    {
        $from = ProjectedPoint::createFromWestingSouthing(Projected::fromSRID(Projected::EPSG_S_JTSK_FERRO_KROVAK), new Metre(568991.00), new Metre(1050538.64));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_S_JTSK);
        $to = $from->krovak($toCRS, new Radian(0.863937979), new Radian(0.741764932), new Radian(0.528627763), new Radian(1.370083463), new Coefficient(0.9999), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(50.20901167, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(16.84977194, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testKrovakNorthOrientated(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_S_JTSK_FERRO_KROVAK_EAST_NORTH), new Metre(-568991.00), new Metre(-1050538.64));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_S_JTSK);
        $to = $from->krovak($toCRS, new Radian(0.863937979), new Radian(0.741764932), new Radian(0.528627763), new Radian(1.370083463), new Coefficient(0.9999), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(50.20901167, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(16.84977194, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testKrovakModified(): void
    {
        $from = ProjectedPoint::createFromWestingSouthing(Projected::fromSRID(Projected::EPSG_S_JTSK_05_FERRO_MODIFIED_KROVAK), new Metre(5568990.91), new Metre(6050538.71));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_S_JTSK_05);
        $to = $from->krovakModified($toCRS, new Radian(0.863937979), new Radian(0.741764932), new Radian(0.528627763), new Radian(1.370083463), new Coefficient(0.9999), new Metre(5000000), new Metre(5000000), new Metre(1089000), new Metre(654000), new Coefficient(2.946529277E-02), new Coefficient(2.515965696E-02), new Coefficient(1.193845912E-07), new Coefficient(-4.668270147E-07), new Coefficient(9.233980362E-12), new Coefficient(1.523735715E-12), new Coefficient(1.696780024E-18), new Coefficient(4.408314235E-18), new Coefficient(-8.331083518E-24), new Coefficient(-3.689471323E-24));

        self::assertEqualsWithDelta(50.20901167, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(16.84977194, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testKrovakModifiedNorthOrientated(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_S_JTSK_05_FERRO_MODIFIED_KROVAK_EAST_NORTH), new Metre(-5568990.91), new Metre(-6050538.71));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_S_JTSK_05);
        $to = $from->krovakModified($toCRS, new Radian(0.863937979), new Radian(0.741764932), new Radian(0.528627763), new Radian(1.370083463), new Coefficient(0.9999), new Metre(5000000), new Metre(5000000), new Metre(1089000), new Metre(654000), new Coefficient(2.946529277E-02), new Coefficient(2.515965696E-02), new Coefficient(1.193845912E-07), new Coefficient(-4.668270147E-07), new Coefficient(9.233980362E-12), new Coefficient(1.523735715E-12), new Coefficient(1.696780024E-18), new Coefficient(4.408314235E-18), new Coefficient(-8.331083518E-24), new Coefficient(-3.689471323E-24));

        self::assertEqualsWithDelta(50.20901167, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(16.84977194, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testLambertAzimuthalEqualArea(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_ETRS89_EXTENDED_LAEA_EUROPE), new Metre(3962799.45), new Metre(2999718.85));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89);
        $to = $from->lambertAzimuthalEqualArea($toCRS, new Degree(52), new Degree(10), new Metre(4321000), new Metre(3210000));

        self::assertEqualsWithDelta(50, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(5, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testLambertAzimuthalEqualAreaSpherical(): void
    {
        $fromCRS = new Projected(
            'foo',
            Cartesian::fromSRID(Cartesian::EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_M),
            new Datum(
                Datum::DATUM_TYPE_GEODETIC,
                new Ellipsoid(
                    new Metre(3),
                    new Metre(3)
                ),
                null,
                null,
            ),
            BoundingArea::createWorld(),
        );
        $from = ProjectedPoint::createFromEastingNorthing($fromCRS, new Metre(-3.2339303), new Metre(6.0257775));

        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->lambertAzimuthalEqualAreaSpherical($toCRS, new Degree(40), new Degree(-100), new Metre(1), new Metre(2));

        self::assertEqualsWithDelta(-20, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(100, $to->getLongitude()->getValue(), 0.000001);
    }

    public function testLambertConicConformal1SP(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_JAD69_JAMAICA_NATIONAL_GRID), new Metre(255966.59), new Metre(142493.51));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_JAD69);
        $to = $from->lambertConicConformal1SP($toCRS, new Degree(18), new Degree(-77), new Coefficient(1), new Metre(250000), new Metre(150000));

        self::assertEqualsWithDelta(0.31297535, $to->getLatitude()->asRadians()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(-1.34292061, $to->getLongitude()->asRadians()->getValue(), 0.0000001);
    }

    public function testLambertConicConformal2SP(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_NAD27_TEXAS_SOUTH_CENTRAL), new USSurveyFoot(2963503.95), new USSurveyFoot(254759.84));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_NAD27);
        $to = $from->lambertConicConformal2SP($toCRS, new Radian(0.48578331), new Radian(-1.72787596), new Radian(0.49538262), new Radian(0.52854388), new USSurveyFoot(2000000), new Metre(0));

        self::assertEqualsWithDelta(0.49741884, $to->getLatitude()->asRadians()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(-1.67551608, $to->getLongitude()->asRadians()->getValue(), 0.0000001);
    }

    public function testLambertConicConformal2SPMichigan(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_NAD27_MICHIGAN_CENTRAL), new USSurveyFoot(2308335.75), new USSurveyFoot(160210.49));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_NAD27);
        $to = $from->lambertConicConformal2SPMichigan($toCRS, new Radian(0.756018454), new Radian(-1.471894336), new Radian(0.771144641), new Radian(0.797615468), new USSurveyFoot(2000000), new Metre(0), new Coefficient(1.0000382));

        self::assertEqualsWithDelta(0.763581548, $to->getLatitude()->asRadians()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(-1.451532161, $to->getLongitude()->asRadians()->getValue(), 0.0000001);
    }

    public function testLambertConicConformal2SPBelgium(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_BD72_BELGE_LAMBERT_72), new Metre(251763.20), new Metre(153034.10));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_BD72);
        $to = $from->lambertConicConformal2SPBelgium($toCRS, new Radian(1.57079633), new Radian(0.07604294), new Radian(0.86975574), new Radian(0.89302680), new Metre(150000.01), new Metre(5400088.44));

        self::assertEqualsWithDelta(0.88452540, $to->getLatitude()->asRadians()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(0.10135773, $to->getLongitude()->asRadians()->getValue(), 0.0000001);
    }

    public function testLambertConicNearConformal(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_DEIR_EZ_ZOR_LEVANT_ZONE), new Metre(15707.96), new Metre(623165.96));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_DEIR_EZ_ZOR);
        $to = $from->lambertConicNearConformal($toCRS, new Radian(0.604756586), new Radian(0.651880476), new Coefficient(0.99962560), new Metre(300000), new Metre(300000));

        self::assertEqualsWithDelta(0.654874806, $to->getLatitude()->asRadians()->getValue(), 0.000000001);
        self::assertEqualsWithDelta(0.595793792, $to->getLongitude()->asRadians()->getValue(), 0.000000001);
    }

    public function testLambertCylindricalEqualArea(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_DEIR_EZ_ZOR_LEVANT_ZONE), new Metre(-332699.8), new Metre(1104391.2));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_DEIR_EZ_ZOR);
        $to = $from->lambertCylindricalEqualArea($toCRS, new Degree(5), new Degree(-75), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(10, $to->getLatitude()->getValue(), 0.001);
        self::assertEqualsWithDelta(-78, $to->getLongitude()->getValue(), 0.001);
    }

    public function testLambertCylindricalEqualAreaSpherical(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_NAD27_ALABAMA_EAST), new Metre(14943016.171313), new Metre(4224343.6292246));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_NAD27);
        $to = $from->lambertCylindricalEqualAreaSpherical($toCRS, new Degree(30), new Degree(-75), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(35, $to->getLatitude()->getValue(), 0.001);
        self::assertEqualsWithDelta(80, $to->getLongitude()->getValue(), 0.001);
    }

    public function testModifiedAzimuthalEquidistant(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_GUAM_1963_YAP_ISLANDS), new Metre(42665.90), new Metre(65509.82));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_GUAM_1963);
        $to = $from->modifiedAzimuthalEquidistant($toCRS, new Radian(0.166621493), new Radian(2.411499514), new Metre(40000), new Metre(60000));

        self::assertEqualsWithDelta(0.167490973, $to->getLatitude()->asRadians()->getValue(), 0.000000001);
        self::assertEqualsWithDelta(2.411923377, $to->getLongitude()->asRadians()->getValue(), 0.000000001);
    }

    public function testObliqueStereographic(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_AMERSFOORT_RD_NEW), new Metre(196105.283), new Metre(557057.739));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_AMERSFOORT);
        $to = $from->obliqueStereographic($toCRS, new Radian(0.910296727), new Radian(0.094032038), new Coefficient(0.9999079), new Metre(155000), new Metre(463000));

        self::assertEqualsWithDelta(53, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(6, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testPolarStereographicVariantA(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_UPS_NORTH_E_N), new Metre(3320416.75), new Metre(632668.43));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->polarStereographicVariantA($toCRS, new Degree(90), new Degree(0), new Coefficient(0.994), new Metre(2000000), new Metre(2000000));

        self::assertEqualsWithDelta(73, $to->getLatitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(44, $to->getLongitude()->getValue(), 0.0001);
    }

    public function testPolarStereographicVariantB(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_AUSTRALIAN_ANTARCTIC_POLAR_STEREOGRAPHIC), new Metre(7255380.79), new Metre(7053389.56));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->polarStereographicVariantB($toCRS, new Degree(-71), new Degree(70), new Metre(6000000), new Metre(6000000));

        self::assertEqualsWithDelta(-75, $to->getLatitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(120, $to->getLongitude()->getValue(), 0.0001);
    }

    public function testPolarStereographicVariantC(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_PETRELS_1972_TERRE_ADELIE_POLAR_STEREOGRAPHIC), new Metre(303169.52), new Metre(244055.72));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_PETRELS_1972);
        $to = $from->polarStereographicVariantC($toCRS, new Degree(-67), new Degree(140), new Metre(300000), new Metre(200000));

        self::assertEqualsWithDelta(-1.162480524, $to->getLatitude()->asRadians()->getValue(), 0.000000001);
        self::assertEqualsWithDelta(2.444707118, $to->getLongitude()->asRadians()->getValue(), 0.000000001);
    }

    public function testPopularVisualisationPseudoMercator(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_PSEUDO_MERCATOR), new Metre(-11169055.58), new Metre(2800000.00));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->popularVisualisationPseudoMercator($toCRS, new Degree(0), new Degree(0), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(0.425542460, $to->getLatitude()->asRadians()->getValue(), 0.000000001);
        self::assertEqualsWithDelta(-1.751147016, $to->getLongitude()->asRadians()->getValue(), 0.000000001);
    }

    public function testSimilarityTransformation(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID('urn:ogc:def:crs:EPSG::23031'), new Metre(300000), new Metre(4500000));
        $toCRS = Projected::fromSRID('urn:ogc:def:crs:EPSG::25831');
        $to = $from->similarityTransformation($toCRS, new Metre(-129.549), new Metre(-208.185), new Coefficient(1.00000155), new Radian(0.000007588), false);

        self::assertEqualsWithDelta(299905.06, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(4499796.51, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testMercatorVariantA(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_MAKASSAR_NEIEZ), new Metre(5009726.58), new Metre(569150.82));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_MAKASSAR);
        $to = $from->mercatorVariantA($toCRS, new Degree(0), new Degree(110), new Unity(0.997), new Metre(3900000), new Metre(900000));

        self::assertEqualsWithDelta(-3, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(120, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testMercatorVariantB(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_PULKOVO_1942_CASPIAN_SEA_MERCATOR), new Metre(165704.29), new Metre(5171848.07));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_PULKOVO_1942);
        $to = $from->mercatorVariantB($toCRS, new Degree(42), new Degree(51), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(53, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(53, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testObliqueMercatorHotineVariantA(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_TIMBALAI_1948_RSO_BORNEO_M), new Metre(679245.73), new Metre(596562.78));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_TIMBALAI_1948);
        $to = $from->obliqueMercatorHotineVariantA($toCRS, new Radian(0.069813170), new Radian(2.007128640), new Radian(0.930536611), new Radian(0.927295218), new Coefficient(0.99984), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(0.094025313, $to->getLatitude()->asRadians()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(2.021187362, $to->getLongitude()->asRadians()->getValue(), 0.0000001);
    }

    public function testObliqueMercatorHotineVariantB(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_TIMBALAI_1948_RSO_BORNEO_M), new Metre(679245.73), new Metre(596562.78));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_TIMBALAI_1948);
        $to = $from->obliqueMercatorHotineVariantB($toCRS, new Radian(0.069813170), new Radian(2.007128640), new Radian(0.930536611), new Radian(0.927295218), new Coefficient(0.99984), new Metre(590476.87), new Metre(442857.65));

        self::assertEqualsWithDelta(0.094025313, $to->getLatitude()->asRadians()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(2.021187362, $to->getLongitude()->asRadians()->getValue(), 0.0000001);
    }

    public function testTransverseMercator(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID), new Metre(577274.99), new Metre(69740.50));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_OSGB36);
        $to = $from->transverseMercator($toCRS, new Degree(49), new Degree(-2), new Unity(0.9996012717), new Metre(400000), new Metre(-100000));

        self::assertEqualsWithDelta(50.5, $to->getLatitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(0.5, $to->getLongitude()->getValue(), 0.0001);
    }

    public function testTransverseMercatorSouthOrientated(): void
    {
        $from = ProjectedPoint::createFromWestingSouthing(Projected::fromSRID(Projected::EPSG_HARTEBEESTHOEK94_LO29), new Metre(71984.49), new Metre(2847342.74));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_HARTEBEESTHOEK94);
        $to = $from->transverseMercator($toCRS, new Degree(0), new Degree(29), new Unity(1), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(-0.449108618, $to->getLatitude()->asRadians()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(0.493625066, $to->getLongitude()->asRadians()->getValue(), 0.0000001);
    }

    public function testTransverseMercatorZonedGridNorthernHemisphere(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_UTM_GRID_SYSTEM_NORTHERN_HEMISPHERE), new Metre(17630084), new Metre(4833439));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->transverseMercatorZonedGrid($toCRS, new Degree(0), new Degree(-180), new Degree(6), new Unity(0.9996), new Metre(500000), new Metre(0));

        self::assertEqualsWithDelta(43.642567, $to->getLatitude()->getValue(), 0.00001);
        self::assertEqualsWithDelta(-79.387139, $to->getLongitude()->getValue(), 0.00001);
    }

    public function testTransverseMercatorZonedGridSouthernHemisphere(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_WGS_84_UTM_GRID_SYSTEM_SOUTHERN_HEMISPHERE), new Metre(56334519), new Metre(6251930));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->transverseMercatorZonedGrid($toCRS, new Degree(0), new Degree(-180), new Degree(6), new Unity(0.9996), new Metre(500000), new Metre(10000000));

        self::assertEqualsWithDelta(-33.859972, $to->getLatitude()->getValue(), 0.00001);
        self::assertEqualsWithDelta(151.211111, $to->getLongitude()->getValue(), 0.00001);
    }

    public function testTransverseMercator3D(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_LUREF_LUXEMBOURG_TM_3D), new Metre(63444.834), new Metre(70387.372), null, new Metre(328.061));
        $toCRS = Geographic3D::fromSRID(Geographic3D::EPSG_LUREF);
        $to = $from->transverseMercator($toCRS, Degree::fromDegreeMinuteSecondHemisphere("49°50'00\"N"), Degree::fromDegreeMinuteSecondHemisphere("6°10'00\"E"), new Unity(1), new Metre(80000), new Metre(100000));

        self::assertEqualsWithDelta(Degree::fromDegreeMinuteSecondHemisphere("49°34'00.7381\"N")->getValue(), $to->getLatitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(Degree::fromDegreeMinuteSecondHemisphere("5°56'16.1460\"E")->getValue(), $to->getLongitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(328.061, $to->getHeight()->asMetres()->getValue(), 0.001);
    }

    public function testNewZealandMapGrid1(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_NZGD49_NEW_ZEALAND_MAP_GRID), new Metre(2487100.664), new Metre(6751049.754));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_NZGD49);
        $to = $from->newZealandMapGrid($toCRS, new Degree(-41), new Degree(173), new Metre(2510000), new Metre(6023150));

        self::assertEqualsWithDelta(-34.444066, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(172.739194, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testNewZealandMapGrid2(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_NZGD49_NEW_ZEALAND_MAP_GRID), new Metre(2486533.434), new Metre(6077263.670));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_NZGD49);
        $to = $from->newZealandMapGrid($toCRS, new Degree(-41), new Degree(173), new Metre(2510000), new Metre(6023150));

        self::assertEqualsWithDelta(-40.512409, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(172.723106, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testNewZealandMapGrid3(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_NZGD49_NEW_ZEALAND_MAP_GRID), new Metre(2216746.395), new Metre(5388508.715));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_NZGD49);
        $to = $from->newZealandMapGrid($toCRS, new Degree(-41), new Degree(173), new Metre(2510000), new Metre(6023150));

        self::assertEqualsWithDelta(-46.651295, $to->getLatitude()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(169.172062, $to->getLongitude()->getValue(), 0.0000001);
    }

    public function testObliqueMercatorLaborde(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_TANANARIVE_PARIS_LABORDE_GRID), new Metre(188333.848), new Metre(1098841.091));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_TANANARIVE_PARIS);
        $to = $from->obliqueMercatorLaborde($toCRS, new Grad(-21), new Grad(49), new Grad(21), new Unity(0.9995), new Metre(400000), new Metre(800000));

        self::assertEqualsWithDelta(-0.282565315, $to->getLatitude()->asRadians()->getValue(), 0.000000001);
        self::assertEqualsWithDelta(0.735138668, $to->getLongitude()->asRadians()->getValue(), 0.000000001);
    }

    public function testComplexPolynomial(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_AMERSFOORT_RD_NEW), new Metre(200000), new Metre(500000));
        $toCRS = Projected::fromSRID(Projected::EPSG_ED50_UTM_ZONE_31N);
        $to = $from->complexPolynomial($toCRS, new Metre(155000), new Metre(463000), new Metre(663395.607), new Metre(5781194.380), new Coefficient(0.00001), new Coefficient(1), new Coefficient(-51.681), new Coefficient(3290.525), new Coefficient(20.172), new Coefficient(1.133), new Coefficient(2.075), new Coefficient(0.251), new Coefficient(0.075), new Coefficient(-0.012));

        self::assertEqualsWithDelta(707155.557, $to->getEasting()->asMetres()->getValue(), 0.001);
        self::assertEqualsWithDelta(5819663.128, $to->getNorthing()->asMetres()->getValue(), 0.001);
    }

    public function testOSTN15(): void
    {
        if (!class_exists(OSTN15OSGM15Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID), new Metre(651409.80373330), new Metre(313177.44988696));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89);
        $to = $from->OSTN15($toCRS, (new OSTN15OSGM15Provider())->provideGrid());

        self::assertEqualsWithDelta(52.658007833, $to->getLatitude()->asDegrees()->getValue(), 0.0001);
        self::assertEqualsWithDelta(1.716073972, $to->getLongitude()->asDegrees()->getValue(), 0.0001);
    }

    public function testLocalOrthographic(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_NAD83_2011_SAN_FRANCISCO_SFO_B18_FTUS), new Metre(876.136), new Metre(98.974));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_NAD83_2011);
        $to = $from->localOrthographic($toCRS, new Radian(0.656749406), new Radian(-2.136177266), new Radian(0.485075480), new Unity(0.9999968), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(0.656698927, $to->getLatitude()->asRadians()->getValue(), 0.0001);
        self::assertEqualsWithDelta(-2.136014902, $to->getLongitude()->asRadians()->getValue(), 0.0001);
    }
}

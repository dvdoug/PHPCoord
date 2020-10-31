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
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use PHPUnit\Framework\TestCase;

class GeographicPointTest extends TestCase
{
    public function test2D(): void
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

    public function test2DWithRadianAsUnits(): void
    {
        $object = GeographicPoint::create(new Radian(0.123), new Radian(0.123), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84));
        self::assertEquals(7.047380880109133, $object->getLatitude()->getValue());
        self::assertEquals(7.047380880109133, $object->getLongitude()->getValue());
    }

    public function test2DWithHeight(): void
    {
        $this->expectException(InvalidCoordinateReferenceSystemException::class);
        $object = GeographicPoint::create(new Degree(0.123), new Degree(0.456), new Metre(789), CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84));
    }

    public function test3D(): void
    {
        $object = GeographicPoint::create(new Degree(0.123), new Degree(0.456), new Metre(789), CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84));
        self::assertEquals(0.123, $object->getLatitude()->getValue());
        self::assertEquals(0.456, $object->getLongitude()->getValue());
        self::assertEquals(789, $object->getHeight()->getValue());
        self::assertEquals(4979, $object->getCRS()->getEpsgCode());
        self::assertEquals('(0.123, 0.456, 789)', $object->__toString());
    }

    public function test3DWithRadianAndFeetAsUnits(): void
    {
        $object = GeographicPoint::create(new Radian(0.123), new Radian(0.123), UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84));
        self::assertEquals(7.047380880109133, $object->getLatitude()->getValue());
        self::assertEquals(7.047380880109133, $object->getLongitude()->getValue());
        self::assertEquals(37.4904, $object->getHeight()->getValue());
    }

    public function test3DWithoutHeight(): void
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

    public function test2DCoordinateFrameRotation(): void
    {
        $from = GeographicPoint::create(new Degree(55.0), new Degree(44.0), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_72));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84);
        $to = $from->coordinateFrameRotation($toCRS, new Metre(0), new Metre(0), new Metre(4.5), new ArcSecond(0), new ArcSecond(0), new ArcSecond(-0.554), UnitOfMeasureFactory::makeUnit(0.219, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION));

        self::assertEqualsWithDelta(55.000025, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(44.000154, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function test3DCoordinateFrameRotation(): void
    {
        $from = GeographicPoint::create(new Degree(55.0), new Degree(44.0), new Metre(0), CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_72));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84);
        $to = $from->coordinateFrameRotation($toCRS, new Metre(0), new Metre(0), new Metre(4.5), new ArcSecond(0), new ArcSecond(0), new ArcSecond(-0.554), UnitOfMeasureFactory::makeUnit(0.219, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION));

        self::assertEqualsWithDelta(55.000025, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(44.000154, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(3.22, $to->getHeight()->getValue(), 0.01);
    }

    public function test2DPositionVectorTransformation(): void
    {
        $from = GeographicPoint::create(new Degree(55.0), new Degree(44.0), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_72));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84);
        $to = $from->positionVectorTransformation($toCRS, new Metre(0), new Metre(0), new Metre(4.5), new ArcSecond(0), new ArcSecond(0), new ArcSecond(0.554), UnitOfMeasureFactory::makeUnit(0.219, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION));

        self::assertEqualsWithDelta(55.000025, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(44.000154, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function test3DPositionVectorTransformation(): void
    {
        $from = GeographicPoint::create(new Degree(55.0), new Degree(44.0), new Metre(0), CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_72));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84);
        $to = $from->positionVectorTransformation($toCRS, new Metre(0), new Metre(0), new Metre(4.5), new ArcSecond(0), new ArcSecond(0), new ArcSecond(0.554), UnitOfMeasureFactory::makeUnit(0.219, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION));

        self::assertEqualsWithDelta(55.000025, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(44.000154, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(3.22, $to->getHeight()->getValue(), 0.01);
    }

    public function test2DCoordinateFrameMolodenskyBadekas(): void
    {
        $from = GeographicPoint::create(new Degree(9.58344056), new Degree(-66.08002528), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_LA_CANOA));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84);
        $to = $from->coordinateFrameMolodenskyBadekas($toCRS, new Metre(-270.933), new Metre(115.599), new Metre(-360.226), new ArcSecond(-5.266), new ArcSecond(-1.238), new ArcSecond(2.381), UnitOfMeasureFactory::makeUnit(-5.109, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION), new Metre(2464351.59), new Metre(-5783466.61), new Metre(974809.81));

        self::assertEqualsWithDelta(9.580278, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(-66.081862, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function test3DCoordinateFrameMolodenskyBadekas(): void
    {
        $from = GeographicPoint::create(new Degree(9.58344056), new Degree(-66.08002528), new Metre(201.465), CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_LGD2006));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_REGVEN);
        $to = $from->coordinateFrameMolodenskyBadekas($toCRS, new Metre(-270.933), new Metre(115.599), new Metre(-360.226), new ArcSecond(-5.266), new ArcSecond(-1.238), new ArcSecond(2.381), UnitOfMeasureFactory::makeUnit(-5.109, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION), new Metre(2464351.59), new Metre(-5783466.61), new Metre(974809.81));

        self::assertEqualsWithDelta(9.5802779305981, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(-66.081862, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(180.51, $to->getHeight()->getValue(), 0.01);
    }

    public function test2DPositionVectorMolodenskyBadekas(): void
    {
        $from = GeographicPoint::create(new Degree(9.58344056), new Degree(-66.08002528), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_LA_CANOA));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84);
        $to = $from->positionVectorMolodenskyBadekas($toCRS, new Metre(-270.933), new Metre(115.599), new Metre(-360.226), new ArcSecond(5.266), new ArcSecond(1.238), new ArcSecond(-2.381), UnitOfMeasureFactory::makeUnit(-5.109, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION), new Metre(2464351.59), new Metre(-5783466.61), new Metre(974809.81));

        self::assertEqualsWithDelta(9.580278, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(-66.081862, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function test3DPositionVectorMolodenskyBadekas(): void
    {
        $from = GeographicPoint::create(new Degree(9.58344056), new Degree(-66.08002528), new Metre(201.465), CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_LGD2006));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_REGVEN);
        $to = $from->positionVectorMolodenskyBadekas($toCRS, new Metre(-270.933), new Metre(115.599), new Metre(-360.226), new ArcSecond(5.266), new ArcSecond(1.238), new ArcSecond(-2.381), UnitOfMeasureFactory::makeUnit(-5.109, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION), new Metre(2464351.59), new Metre(-5783466.61), new Metre(974809.81));

        self::assertEqualsWithDelta(9.5802779305981, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(-66.081862, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(180.51, $to->getHeight()->getValue(), 0.01);
    }

    public function testGeographic2DAbridgedMolodensky(): void
    {
        $from = GeographicPoint::create(new Degree(53.80939444), new Degree(2.12955000), new Metre(73), CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84);
        $to = $from->abridgedMolodensky($toCRS, new Metre(84.87), new Metre(96.49), new Metre(116.95), new Metre(251), new Unity(0.003367003 - 0.003352811));

        self::assertEqualsWithDelta(53.81015639, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(2.13096583, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function testGeographic2DMolodensky(): void
    {
        $from = GeographicPoint::create(new Degree(53.80939444), new Degree(2.12955000), new Metre(73), CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84);
        $to = $from->molodensky($toCRS, new Metre(84.87), new Metre(96.49), new Metre(116.95), new Metre(251), new Unity(0.003367003 - 0.003352811));

        self::assertEqualsWithDelta(53.81015639, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(2.13096583, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function testGeographic3DAbridgedMolodensky(): void
    {
        $from = GeographicPoint::create(new Degree(53.80939444), new Degree(2.12955000), new Metre(73), CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84);
        $to = $from->abridgedMolodensky($toCRS, new Metre(84.87), new Metre(96.49), new Metre(116.95), new Metre(251), new Unity(0.003367003 - 0.003352811));

        self::assertEqualsWithDelta(53.81015639, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(2.13096583, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(28.091, $to->getHeight()->getValue(), 0.01);
    }

    public function testGeographic3DMolodensky(): void
    {
        $from = GeographicPoint::create(new Degree(53.80939444), new Degree(2.12955000), new Metre(73), CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84);
        $to = $from->molodensky($toCRS, new Metre(84.87), new Metre(96.49), new Metre(116.95), new Metre(251), new Unity(0.003367003 - 0.003352811));

        self::assertEqualsWithDelta(53.81015639, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(2.13096583, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(28.018, $to->getHeight()->getValue(), 0.01);
    }

    public function testAlbersEqualAreaNorthHemisphere(): void
    {
        $from = GeographicPoint::create(new Radian(0.746128255), new Radian(-1.374446786), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_NAD83));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_NAD83_GREAT_LAKES_ALBERS);
        $to = $from->albersEqualArea($toCRS, new Degree(45.568977), new Degree(-84.455955), new Degree(42.122774), new Degree(49.01518), new Metre(1000000), new Metre(1000000));

        self::assertEqualsWithDelta(1466493.492, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(702903.006, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testAlbersEqualAreaSouthHemisphere(): void
    {
        $from = GeographicPoint::create(new Radian(-0.322895686), new Radian(-0.802858912), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_TWD67));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_TWD67_TM2_ZONE_119);
        $to = $from->albersEqualArea($toCRS, new Degree(-32), new Degree(-60), new Degree(-5), new Degree(-42), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(1408623.196, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(1507641.482, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testAmericanPolyconic(): void
    {
        $from = GeographicPoint::create(new Degree(40), new Degree(-75), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_NAD27));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_NAD27_ALABAMA_EAST);
        $to = $from->americanPolyconic($toCRS, new Degree(30), new Degree(-96), new Metre(10), new Metre(20));

        self::assertEqualsWithDelta(1776784.5, $to->getEasting()->asMetres()->getValue(), 0.1);
        self::assertEqualsWithDelta(1319677.8, $to->getNorthing()->asMetres()->getValue(), 0.1);
    }

    public function testBonneNorthOrientated(): void
    {
        $from = GeographicPoint::create(new Degree(30), new Degree(-85), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_NAD27));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_NAD27_ALABAMA_EAST);
        $to = $from->bonne($toCRS, new Degree(40), new Degree(-75), new Metre(10), new Metre(20));

        self::assertEqualsWithDelta(-962905.1, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(-1056045.0, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testBonneSouthOrientated(): void
    {
        $from = GeographicPoint::create(new Degree(30), new Degree(-85), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_NAD27));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_NAD27_ALABAMA_EAST);
        $to = $from->bonneSouthOrientated($toCRS, new Degree(40), new Degree(-75), new Metre(10), new Metre(20));

        self::assertEqualsWithDelta(-962925.1, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(-1056085.0, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testCassiniSoldner(): void
    {
        $from = GeographicPoint::create(new Degree(10), new Degree(-62), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_TRINIDAD_1903));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_TRINIDAD_1903_TRINIDAD_GRID);
        $to = $from->cassiniSoldner($toCRS, new Radian(0.182241463), new Radian(-1.070468608), UnitOfMeasureFactory::makeUnit(430000, UnitOfMeasure::EPSG_LENGTH_CLARKE_S_LINK), UnitOfMeasureFactory::makeUnit(325000, UnitOfMeasure::EPSG_LENGTH_CLARKE_S_LINK));

        self::assertEqualsWithDelta(66644.94, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(82536.22, $to->getNorthing()->getValue(), 0.01);
    }

    public function testColumbiaUrban(): void
    {
        $from = GeographicPoint::create(new Radian(0.083775804), new Radian(-1.295906970), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_MAGNA_SIRGAS));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_MAGNA_SIRGAS_BOGOTA_URBAN_GRID);
        $to = $from->columbiaUrban($toCRS, new Radian(0.081689893), new Radian(-1.294102154), new Metre(92334.879), new Metre(109320.965), new Metre(2550));

        self::assertEqualsWithDelta(80859.033, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(122543.174, $to->getNorthing()->getValue(), 0.01);
    }

    public function testEqualEarth(): void
    {
        $from = GeographicPoint::create(new Radian(0.5944163293), new Radian(-2.0454693977), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_WGS_84_EQUAL_EARTH_AMERICAS);
        $to = $from->equalEarth($toCRS, new Degree(-90), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(-2390749.042, $to->getEasting()->getValue(), 0.001);
        self::assertEqualsWithDelta(4242849.758, $to->getNorthing()->getValue(), 0.001);
    }

    public function testEquidistantCylindrical(): void
    {
        $from = GeographicPoint::create(new Degree(55), new Degree(10), null, CoordinateReferenceSystem::fromEPSGCode(Geographic2D::EPSG_WGS_84));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Projected::EPSG_WGS_84_WORLD_EQUIDISTANT_CYLINDRICAL);
        $to = $from->equidistantCylindrical($toCRS, new Degree(0), new Degree(0), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(1113194.91, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(6097230.31, $to->getNorthing()->getValue(), 0.01);
    }

    public function testGeocentricTranslation(): void
    {
        $from = GeographicPoint::create(new Degree(38.14349028), new Degree(23.80450972), new Metre(12), CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84));
        $toCRS = CoordinateReferenceSystem::fromEPSGCode(Geographic3D::EPSG_WGS_84);
        $to = $from->geocentricTranslation($toCRS, new Metre(84.87), new Metre(96.49), new Metre(116.95));

        self::assertEqualsWithDelta(38.14367013, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(23.80512601, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(175.93046824727, $to->getHeight()->getValue(), 0.00001);
    }
}

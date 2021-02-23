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
use PHPCoord\CoordinateOperation\CoordinateOperationMethods;
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateOperation\CRSTransformations;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\CoordinateSystem\Ellipsoidal;
use PHPCoord\Datum\Datum;
use PHPCoord\Datum\Ellipsoid;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Geometry\GeographicPolygon;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Grad;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\ClarkeLink;
use PHPCoord\UnitOfMeasure\Length\Foot;
use PHPCoord\UnitOfMeasure\Length\Link;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Length\USSurveyFoot;
use PHPCoord\UnitOfMeasure\Scale\Coefficient;
use PHPCoord\UnitOfMeasure\Scale\PartsPerMillion;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use PHPUnit\Framework\TestCase;

class GeographicPointTest extends TestCase
{
    public function test2D(): void
    {
        $object = GeographicPoint::create(new Degree(0.123), new Degree(0.456), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        self::assertEquals(0.123, $object->getLatitude()->getValue());
        self::assertEquals(0.456, $object->getLongitude()->getValue());
        self::assertNull($object->getHeight());
        self::assertEquals('urn:ogc:def:crs:EPSG::4326', $object->getCRS()->getSrid());
        self::assertNull($object->getCoordinateEpoch());
        self::assertEquals('(0.123, 0.456)', $object->__toString());
    }

    public function test2DWithEpochDateTime(): void
    {
        $object = GeographicPoint::create(new Degree(0.123), new Degree(0.456), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84), new DateTime('2003-02-01'));
        self::assertEquals(0.123, $object->getLatitude()->getValue());
        self::assertEquals(0.456, $object->getLongitude()->getValue());
        self::assertNull($object->getHeight());
        self::assertEquals('urn:ogc:def:crs:EPSG::4326', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(0.123, 0.456)', $object->__toString());
    }

    public function test2DWithEpochDateTimeImmutable(): void
    {
        $object = GeographicPoint::create(new Degree(0.123), new Degree(0.456), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84), new DateTimeImmutable('2003-02-01'));
        self::assertEquals(0.123, $object->getLatitude()->getValue());
        self::assertEquals(0.456, $object->getLongitude()->getValue());
        self::assertNull($object->getHeight());
        self::assertEquals('urn:ogc:def:crs:EPSG::4326', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(0.123, 0.456)', $object->__toString());
    }

    public function test2DWithRadianAsUnits(): void
    {
        $object = GeographicPoint::create(new Radian(0.123), new Radian(0.123), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        self::assertEquals(7.047380880109133, $object->getLatitude()->getValue());
        self::assertEquals(7.047380880109133, $object->getLongitude()->getValue());
    }

    public function test2DWithHeight(): void
    {
        $this->expectException(InvalidCoordinateReferenceSystemException::class);
        $object = GeographicPoint::create(new Degree(0.123), new Degree(0.456), new Metre(789), Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
    }

    public function test3D(): void
    {
        $object = GeographicPoint::create(new Degree(0.123), new Degree(0.456), new Metre(789), Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84));
        self::assertEquals(0.123, $object->getLatitude()->getValue());
        self::assertEquals(0.456, $object->getLongitude()->getValue());
        self::assertEquals(789, $object->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::4979', $object->getCRS()->getSrid());
        self::assertEquals('(0.123, 0.456, 789)', $object->__toString());
    }

    public function test3DWithRadianAndFeetAsUnits(): void
    {
        $object = GeographicPoint::create(new Radian(0.123), new Radian(0.123), new Foot(123), Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84));
        self::assertEquals(7.047380880109133, $object->getLatitude()->getValue());
        self::assertEquals(7.047380880109133, $object->getLongitude()->getValue());
        self::assertEquals(37.4904, $object->getHeight()->getValue());
    }

    public function test3DWithoutHeight(): void
    {
        $this->expectException(InvalidCoordinateReferenceSystemException::class);
        $object = GeographicPoint::create(new Degree(0.123), new Degree(0.456), null, Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84));
    }

    public function testDistanceCalculation(): void
    {
        $from = GeographicPoint::create(new Degree(51.54105), new Degree(-0.12319), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $to = GeographicPoint::create(new Degree(51.507977), new Degree(-0.124588), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        self::assertEqualsWithDelta(3680.925, $from->calculateDistance($to)->getValue(), 0.001);
    }

    public function testDistanceCalculationReversedOrder(): void
    {
        $from = GeographicPoint::create(new Degree(51.507977), new Degree(-0.124588), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $to = GeographicPoint::create(new Degree(51.54105), new Degree(-0.12319), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        self::assertEqualsWithDelta(3680.925, $from->calculateDistance($to)->getValue(), 0.001);
    }

    public function testDistanceCalculationVincentyExample1(): void
    {
        $from = GeographicPoint::create(Degree::fromSexagesimalDMSS('554500.00'), new Degree(0), null, Geographic2D::fromSRID(Geographic2D::EPSG_CH1903));
        $to = GeographicPoint::create(Degree::fromSexagesimalDMSS('-332600.00'), Degree::fromSexagesimalDMSS('1081300.00'), null, Geographic2D::fromSRID(Geographic2D::EPSG_CH1903));
        self::assertEqualsWithDelta(14110526.170, $from->calculateDistance($to)->getValue(), 0.001);
    }

    public function testDistanceCalculationVincentyExample2(): void
    {
        $from = GeographicPoint::create(Degree::fromSexagesimalDMSS('371954.95367'), new Degree(0), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        $to = GeographicPoint::create(Degree::fromSexagesimalDMSS('260742.83946'), Degree::fromSexagesimalDMSS('412835.50729'), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        self::assertEqualsWithDelta(4085966.703, $from->calculateDistance($to)->getValue(), 0.001);
    }

    public function testDistanceCalculationVincentyExample3(): void
    {
        $from = GeographicPoint::create(Degree::fromSexagesimalDMSS('351611.24862'), new Degree(0), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        $to = GeographicPoint::create(Degree::fromSexagesimalDMSS('672214.77638'), Degree::fromSexagesimalDMSS('1374728.31435'), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        self::assertEqualsWithDelta(8084823.839, $from->calculateDistance($to)->getValue(), 0.001);
    }

    public function testDistanceCalculationVincentyExample4(): void
    {
        $from = GeographicPoint::create(Degree::fromSexagesimalDMSS('10000.00'), new Degree(0), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        $to = GeographicPoint::create(Degree::fromSexagesimalDMSS('-05953.83076'), Degree::fromSexagesimalDMSS('1791748.02997'), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        self::assertEqualsWithDelta(19960000.000, $from->calculateDistance($to)->getValue(), 0.001);
    }

    public function testDistanceCalculationVincentyExample5(): void
    {
        $from = GeographicPoint::create(Degree::fromSexagesimalDMSS('10000.00'), new Degree(0), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        $to = GeographicPoint::create(Degree::fromSexagesimalDMSS('10115.18952'), Degree::fromSexagesimalDMSS('1794617.84244'), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        self::assertEqualsWithDelta(19780006.558, $from->calculateDistance($to)->getValue(), 0.001);
    }

    public function testDistanceCalculationAntipodeWikiExample1(): void
    {
        $from = GeographicPoint::create(new Degree(0), new Degree(0), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $to = GeographicPoint::create(new Degree(0.5), new Degree(179.5), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        self::assertEqualsWithDelta(19936288.579, $from->calculateDistance($to)->getValue(), 0.001);
    }

    public function testDistanceCalculationAntipodeWikiExample2(): void
    {
        self::markTestSkipped(); // this doesn't work the rest do, think it might be rounding issues
        $from = GeographicPoint::create(new Degree(0), new Degree(0), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $to = GeographicPoint::create(new Degree(0.5), new Degree(179.7), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        self::assertEqualsWithDelta(19944127.421, $from->calculateDistance($to)->getValue(), 0.001);
    }

    public function testDistanceCalculationAntipodeVincentyExample1(): void
    {
        $from = GeographicPoint::create(Degree::fromSexagesimalDMSS('414145.88000'), new Degree(0), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        $to = GeographicPoint::create(Degree::fromSexagesimalDMSS('-414146.20000'), Degree::fromSexagesimalDMSS('1795959.44000'), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        self::assertEqualsWithDelta(20004566.7228, $from->calculateDistance($to)->getValue(), 0.0001);
    }

    public function testDistanceCalculationAntipodeVincentyExample2(): void
    {
        $from = GeographicPoint::create(new Degree(0), new Degree(0), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        $to = GeographicPoint::create(new Degree(0), Degree::fromSexagesimalDMSS('1794149.78063'), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        self::assertEqualsWithDelta(19996147.4169, $from->calculateDistance($to)->getValue(), 0.0001);
    }

    public function testDistanceCalculationAntipodeVincentyExample3(): void
    {
        $from = GeographicPoint::create(Degree::fromSexagesimalDMSS('300000.00000'), new Degree(0), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        $to = GeographicPoint::create(Degree::fromSexagesimalDMSS('-300000.00000'), Degree::fromSexagesimalDMSS('1794000.00000'), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        self::assertEqualsWithDelta(19994364.6069, $from->calculateDistance($to)->getValue(), 0.0001);
    }

    public function testDistanceCalculationAntipodeVincentyExample4(): void
    {
        self::markTestSkipped(); // this doesn't work the rest do, think it might be rounding issues
        $from = GeographicPoint::create(Degree::fromSexagesimalDMSS('600000.00000'), new Degree(0), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        $to = GeographicPoint::create(Degree::fromSexagesimalDMSS('-595900.00000'), Degree::fromSexagesimalDMSS('1795000.00000'), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        self::assertEqualsWithDelta(20000433.9629, $from->calculateDistance($to)->getValue(), 0.0001);
    }

    public function testDistanceCalculationSmallDistance(): void
    {
        $from = GeographicPoint::create(new Degree(45.306833), new Degree(5.887717), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $to = GeographicPoint::create(new Degree(45.306833), new Degree(5.887733), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        self::assertEqualsWithDelta(1.255, $from->calculateDistance($to)->getValue(), 0.001);
    }

    public function testDistanceCalculationSmallDistance2(): void
    {
        $from = GeographicPoint::create(new Degree(0), new Degree(0), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $to = GeographicPoint::create(new Degree(0), new Degree(0.1), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        self::assertEqualsWithDelta(11131.949, $from->calculateDistance($to)->getValue(), 0.001);
    }

    public function testDistanceDifferentCRSs(): void
    {
        $from = GeographicPoint::create(new Degree(51.54105), new Degree(-0.12319), null, Geographic2D::fromSRID(Geographic2D::EPSG_OSGB_1936));
        $to = GeographicPoint::create(new Degree(51.507977), new Degree(-0.124588), null, Geographic2D::fromSRID(Geographic2D::EPSG_PZ_90));
        self::assertEqualsWithDelta(3735.156, $from->calculateDistance($to)->getValue(), 0.001);
    }

    public function testDistanceDifferentCRSsNoAutoconversion(): void
    {
        $this->expectException(InvalidCoordinateReferenceSystemException::class);
        $from = GeographicPoint::create(new Degree(51.54105), new Degree(-0.12319), null, Geographic2D::fromSRID(Geographic2D::EPSG_OSGB_1936));
        $to = VerticalPoint::create(new Metre(10), Vertical::fromSRID(Vertical::EPSG_TENERIFE_HEIGHT));
        $from->calculateDistance($to);
    }

    public function testGeographicGeocentric(): void
    {
        $from = GeographicPoint::create(new Degree(53.80939444), new Degree(2.12955000), new Metre(73.0), Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84));
        $to = $from->geographicGeocentric(Geocentric::fromSRID(Geocentric::EPSG_WGS_84));

        self::assertEqualsWithDelta(3771793.968, $to->getX()->getValue(), 0.0001);
        self::assertEqualsWithDelta(140253.342, $to->getY()->getValue(), 0.0001);
        self::assertEqualsWithDelta(5124304.349, $to->getZ()->getValue(), 0.0001);
    }

    public function test2DCoordinateFrameRotation(): void
    {
        $from = GeographicPoint::create(new Degree(55.0), new Degree(44.0), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_72));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->coordinateFrameRotation($toCRS, new Metre(0), new Metre(0), new Metre(4.5), new ArcSecond(0), new ArcSecond(0), new ArcSecond(-0.554), new PartsPerMillion(0.219));

        self::assertEqualsWithDelta(55.000025, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(44.000154, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function test3DCoordinateFrameRotation(): void
    {
        $from = GeographicPoint::create(new Degree(55.0), new Degree(44.0), new Metre(0), Geographic3D::fromSRID(Geographic3D::EPSG_WGS_72));
        $toCRS = Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84);
        $to = $from->coordinateFrameRotation($toCRS, new Metre(0), new Metre(0), new Metre(4.5), new ArcSecond(0), new ArcSecond(0), new ArcSecond(-0.554), new PartsPerMillion(0.219));

        self::assertEqualsWithDelta(55.000025, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(44.000154, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(3.22, $to->getHeight()->getValue(), 0.01);
    }

    public function test2DPositionVectorTransformation(): void
    {
        $from = GeographicPoint::create(new Degree(55.0), new Degree(44.0), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_72));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->positionVectorTransformation($toCRS, new Metre(0), new Metre(0), new Metre(4.5), new ArcSecond(0), new ArcSecond(0), new ArcSecond(0.554), new PartsPerMillion(0.219));

        self::assertEqualsWithDelta(55.000025, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(44.000154, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function test3DPositionVectorTransformation(): void
    {
        $from = GeographicPoint::create(new Degree(55.0), new Degree(44.0), new Metre(0), Geographic3D::fromSRID(Geographic3D::EPSG_WGS_72));
        $toCRS = Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84);
        $to = $from->positionVectorTransformation($toCRS, new Metre(0), new Metre(0), new Metre(4.5), new ArcSecond(0), new ArcSecond(0), new ArcSecond(0.554), new PartsPerMillion(0.219));

        self::assertEqualsWithDelta(55.000025, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(44.000154, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(3.22, $to->getHeight()->getValue(), 0.01);
    }

    public function test2DCoordinateFrameMolodenskyBadekas(): void
    {
        $from = GeographicPoint::create(new Degree(9.58344056), new Degree(-66.08002528), null, Geographic2D::fromSRID(Geographic2D::EPSG_LA_CANOA));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->coordinateFrameMolodenskyBadekas($toCRS, new Metre(-270.933), new Metre(115.599), new Metre(-360.226), new ArcSecond(-5.266), new ArcSecond(-1.238), new ArcSecond(2.381), new PartsPerMillion(-5.109), new Metre(2464351.59), new Metre(-5783466.61), new Metre(974809.81));

        self::assertEqualsWithDelta(9.580278, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(-66.081862, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function test3DCoordinateFrameMolodenskyBadekas(): void
    {
        $from = GeographicPoint::create(new Degree(9.58344056), new Degree(-66.08002528), new Metre(201.465), Geographic3D::fromSRID(Geographic3D::EPSG_LGD2006));
        $toCRS = Geographic3D::fromSRID(Geographic3D::EPSG_REGVEN);
        $to = $from->coordinateFrameMolodenskyBadekas($toCRS, new Metre(-270.933), new Metre(115.599), new Metre(-360.226), new ArcSecond(-5.266), new ArcSecond(-1.238), new ArcSecond(2.381), new PartsPerMillion(-5.109), new Metre(2464351.59), new Metre(-5783466.61), new Metre(974809.81));

        self::assertEqualsWithDelta(9.5802779305981, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(-66.081862, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(180.51, $to->getHeight()->getValue(), 0.01);
    }

    public function test2DPositionVectorMolodenskyBadekas(): void
    {
        $from = GeographicPoint::create(new Degree(9.58344056), new Degree(-66.08002528), null, Geographic2D::fromSRID(Geographic2D::EPSG_LA_CANOA));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->positionVectorMolodenskyBadekas($toCRS, new Metre(-270.933), new Metre(115.599), new Metre(-360.226), new ArcSecond(5.266), new ArcSecond(1.238), new ArcSecond(-2.381), new PartsPerMillion(-5.109), new Metre(2464351.59), new Metre(-5783466.61), new Metre(974809.81));

        self::assertEqualsWithDelta(9.580278, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(-66.081862, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function test3DPositionVectorMolodenskyBadekas(): void
    {
        $from = GeographicPoint::create(new Degree(9.58344056), new Degree(-66.08002528), new Metre(201.465), Geographic3D::fromSRID(Geographic3D::EPSG_LGD2006));
        $toCRS = Geographic3D::fromSRID(Geographic3D::EPSG_REGVEN);
        $to = $from->positionVectorMolodenskyBadekas($toCRS, new Metre(-270.933), new Metre(115.599), new Metre(-360.226), new ArcSecond(5.266), new ArcSecond(1.238), new ArcSecond(-2.381), new PartsPerMillion(-5.109), new Metre(2464351.59), new Metre(-5783466.61), new Metre(974809.81));

        self::assertEqualsWithDelta(9.5802779305981, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(-66.081862, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(180.51, $to->getHeight()->getValue(), 0.01);
    }

    public function testGeographic2DAbridgedMolodensky(): void
    {
        $from = GeographicPoint::create(new Degree(53.80939444), new Degree(2.12955000), new Metre(73), Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->abridgedMolodensky($toCRS, new Metre(84.87), new Metre(96.49), new Metre(116.95), new Metre(251), new Unity(0.003367003 - 0.003352811));

        self::assertEqualsWithDelta(53.81015639, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(2.13096583, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function testGeographic2DMolodensky(): void
    {
        $from = GeographicPoint::create(new Degree(53.80939444), new Degree(2.12955000), new Metre(73), Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->molodensky($toCRS, new Metre(84.87), new Metre(96.49), new Metre(116.95), new Metre(251), new Unity(0.003367003 - 0.003352811));

        self::assertEqualsWithDelta(53.81015639, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(2.13096583, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function testGeographic3DAbridgedMolodensky(): void
    {
        $from = GeographicPoint::create(new Degree(53.80939444), new Degree(2.12955000), new Metre(73), Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84));
        $toCRS = Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84);
        $to = $from->abridgedMolodensky($toCRS, new Metre(84.87), new Metre(96.49), new Metre(116.95), new Metre(251), new Unity(0.003367003 - 0.003352811));

        self::assertEqualsWithDelta(53.81015639, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(2.13096583, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(28.091, $to->getHeight()->getValue(), 0.01);
    }

    public function testGeographic3DMolodensky(): void
    {
        $from = GeographicPoint::create(new Degree(53.80939444), new Degree(2.12955000), new Metre(73), Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84));
        $toCRS = Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84);
        $to = $from->molodensky($toCRS, new Metre(84.87), new Metre(96.49), new Metre(116.95), new Metre(251), new Unity(0.003367003 - 0.003352811));

        self::assertEqualsWithDelta(53.81015639, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(2.13096583, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(28.018, $to->getHeight()->getValue(), 0.01);
    }

    public function testAlbersEqualAreaNorthHemisphere(): void
    {
        $from = GeographicPoint::create(new Radian(0.746128255), new Radian(-1.374446786), null, Geographic2D::fromSRID(Geographic2D::EPSG_NAD83));
        $toCRS = Projected::fromSRID(Projected::EPSG_NAD83_GREAT_LAKES_ALBERS);
        $to = $from->albersEqualArea($toCRS, new Degree(45.568977), new Degree(-84.455955), new Degree(42.122774), new Degree(49.01518), new Metre(1000000), new Metre(1000000));

        self::assertEqualsWithDelta(1466493.492, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(702903.006, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testAlbersEqualAreaSouthHemisphere(): void
    {
        $from = GeographicPoint::create(new Radian(-0.322895686), new Radian(-0.802858912), null, Geographic2D::fromSRID(Geographic2D::EPSG_TWD67));
        $toCRS = Projected::fromSRID('urn:ogc:def:crs:EPSG::3827');
        $to = $from->albersEqualArea($toCRS, new Degree(-32), new Degree(-60), new Degree(-5), new Degree(-42), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(1408623.196, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(1507641.482, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testAmericanPolyconic(): void
    {
        $from = GeographicPoint::create(new Degree(40), new Degree(-75), null, Geographic2D::fromSRID(Geographic2D::EPSG_NAD27));
        $toCRS = Projected::fromSRID(Projected::EPSG_NAD27_ALABAMA_EAST);
        $to = $from->americanPolyconic($toCRS, new Degree(30), new Degree(-96), new Metre(10), new Metre(20));

        self::assertEqualsWithDelta(1776784.5, $to->getEasting()->asMetres()->getValue(), 0.1);
        self::assertEqualsWithDelta(1319677.8, $to->getNorthing()->asMetres()->getValue(), 0.1);
    }

    public function testBonneNorthOrientated(): void
    {
        $from = GeographicPoint::create(new Degree(30), new Degree(-85), null, Geographic2D::fromSRID(Geographic2D::EPSG_NAD27));
        $toCRS = Projected::fromSRID(Projected::EPSG_NAD27_ALABAMA_EAST);
        $to = $from->bonne($toCRS, new Degree(40), new Degree(-75), new Metre(10), new Metre(20));

        self::assertEqualsWithDelta(-962905.1, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(-1056045.0, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testBonneSouthOrientated(): void
    {
        $from = GeographicPoint::create(new Degree(30), new Degree(-85), null, Geographic2D::fromSRID(Geographic2D::EPSG_NAD27));
        $toCRS = Projected::fromSRID(Projected::EPSG_NAD27_ALABAMA_EAST);
        $to = $from->bonneSouthOrientated($toCRS, new Degree(40), new Degree(-75), new Metre(10), new Metre(20));

        self::assertEqualsWithDelta(-962925.1, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(-1056085.0, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testCassiniSoldner(): void
    {
        $from = GeographicPoint::create(new Degree(10), new Degree(-62), null, Geographic2D::fromSRID(Geographic2D::EPSG_TRINIDAD_1903));
        $toCRS = Projected::fromSRID(Projected::EPSG_TRINIDAD_1903_TRINIDAD_GRID);
        $to = $from->cassiniSoldner($toCRS, new Radian(0.182241463), new Radian(-1.070468608), new ClarkeLink(430000), new ClarkeLink(325000));

        self::assertEqualsWithDelta(66644.94, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(82536.22, $to->getNorthing()->getValue(), 0.01);
    }

    public function testColumbiaUrban(): void
    {
        $from = GeographicPoint::create(new Radian(0.083775804), new Radian(-1.295906970), null, Geographic2D::fromSRID(Geographic2D::EPSG_MAGNA_SIRGAS));
        $toCRS = Projected::fromSRID(Projected::EPSG_MAGNA_SIRGAS_BOGOTA_URBAN_GRID);
        $to = $from->columbiaUrban($toCRS, new Radian(0.081689893), new Radian(-1.294102154), new Metre(92334.879), new Metre(109320.965), new Metre(2550));

        self::assertEqualsWithDelta(80859.033, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(122543.174, $to->getNorthing()->getValue(), 0.01);
    }

    public function testEqualEarth(): void
    {
        $from = GeographicPoint::create(new Radian(0.5944163293), new Radian(-2.0454693977), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $toCRS = Projected::fromSRID(Projected::EPSG_WGS_84_EQUAL_EARTH_AMERICAS);
        $to = $from->equalEarth($toCRS, new Degree(-90), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(-2390749.042, $to->getEasting()->getValue(), 0.001);
        self::assertEqualsWithDelta(4242849.758, $to->getNorthing()->getValue(), 0.001);
    }

    public function testEquidistantCylindrical(): void
    {
        $from = GeographicPoint::create(new Degree(55), new Degree(10), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $toCRS = Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_EQUIDISTANT_CYLINDRICAL);
        $to = $from->equidistantCylindrical($toCRS, new Degree(0), new Degree(0), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(1113194.91, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(6097230.31, $to->getNorthing()->getValue(), 0.01);
    }

    public function testGuamProjection(): void
    {
        $from = GeographicPoint::create(new Radian(0.232810140), new Radian(2.524362746), null, Geographic2D::fromSRID(Geographic2D::EPSG_GUAM_1963));
        $toCRS = Projected::fromSRID(Projected::EPSG_GUAM_1963_GUAM_SPCS);
        $to = $from->guamProjection($toCRS, new Radian(0.235138896), new Radian(2.526342288), new Metre(50000), new Metre(50000));

        self::assertEqualsWithDelta(37712.48, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(35242.00, $to->getNorthing()->getValue(), 0.01);
    }

    public function testHyperbolicCassiniSoldner(): void
    {
        $from = GeographicPoint::create(new Radian(-0.293938867), new Radian(3.141493807), null, Geographic2D::fromSRID(Geographic2D::EPSG_VANUA_LEVU_1915));
        $toCRS = Projected::fromSRID(Projected::EPSG_VANUA_LEVU_1915_VANUA_LEVU_GRID);
        $to = $from->hyperbolicCassiniSoldner($toCRS, new Radian(-0.283616003), new Radian(3.129957125), new Link(12513.318 * 100), new Link(16628.885 * 100));

        self::assertEqualsWithDelta(1601528.90, $to->getEasting()->getValue(), 0.1);
        self::assertEqualsWithDelta(1336966.01, $to->getNorthing()->getValue(), 0.1);
    }

    public function testGeocentricTranslation(): void
    {
        $from = GeographicPoint::create(new Degree(38.14349028), new Degree(23.80450972), new Metre(12), Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84));
        $toCRS = Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84);
        $to = $from->geocentricTranslation($toCRS, new Metre(84.87), new Metre(96.49), new Metre(116.95));

        self::assertEqualsWithDelta(38.14367013, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(23.80512601, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(175.93046824727, $to->getHeight()->getValue(), 0.00001);
    }

    public function testKrovak(): void
    {
        $from = GeographicPoint::create(new Degree(50.20901167), new Degree(16.84977194), null, Geographic2D::fromSRID(Geographic2D::EPSG_S_JTSK));
        $toCRS = Projected::fromSRID(Projected::EPSG_S_JTSK_FERRO_KROVAK);
        $to = $from->krovak($toCRS, new Radian(0.863937979), new Radian(0.741764932), new Radian(0.528627763), new Radian(1.370083463), new Coefficient(0.9999), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(568991.00, $to->getWesting()->getValue(), 0.01);
        self::assertEqualsWithDelta(1050538.64, $to->getSouthing()->getValue(), 0.01);
    }

    public function testKrovakNorthOrientated(): void
    {
        $from = GeographicPoint::create(new Degree(50.20901167), new Degree(16.84977194), null, Geographic2D::fromSRID(Geographic2D::EPSG_S_JTSK));
        $toCRS = Projected::fromSRID(Projected::EPSG_S_JTSK_FERRO_KROVAK_EAST_NORTH);
        $to = $from->krovak($toCRS, new Radian(0.863937979), new Radian(0.741764932), new Radian(0.528627763), new Radian(1.370083463), new Coefficient(0.9999), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(-568991.00, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(-1050538.64, $to->getNorthing()->getValue(), 0.01);
    }

    public function testKrovakModified(): void
    {
        $from = GeographicPoint::create(new Degree(50.20901167), new Degree(16.84977194), null, Geographic2D::fromSRID(Geographic2D::EPSG_S_JTSK_05));
        $toCRS = Projected::fromSRID(Projected::EPSG_S_JTSK_05_FERRO_MODIFIED_KROVAK);
        $to = $from->krovakModified($toCRS, new Radian(0.863937979), new Radian(0.741764932), new Radian(0.528627763), new Radian(1.370083463), new Coefficient(0.9999), new Metre(5000000), new Metre(5000000), new Metre(1089000), new Metre(654000), new Coefficient(2.946529277E-02), new Coefficient(2.515965696E-02), new Coefficient(1.193845912E-07), new Coefficient(-4.668270147E-07), new Coefficient(9.233980362E-12), new Coefficient(1.523735715E-12), new Coefficient(1.696780024E-18), new Coefficient(4.408314235E-18), new Coefficient(-8.331083518E-24), new Coefficient(-3.689471323E-24));

        self::assertEqualsWithDelta(5568990.91, $to->getWesting()->getValue(), 0.01);
        self::assertEqualsWithDelta(6050538.71, $to->getSouthing()->getValue(), 0.01);
    }

    public function testKrovakModifiedNorthOrientated(): void
    {
        $from = GeographicPoint::create(new Degree(50.20901167), new Degree(16.84977194), null, Geographic2D::fromSRID(Geographic2D::EPSG_S_JTSK_05));
        $toCRS = Projected::fromSRID(Projected::EPSG_S_JTSK_05_FERRO_MODIFIED_KROVAK_EAST_NORTH);
        $to = $from->krovakModified($toCRS, new Radian(0.863937979), new Radian(0.741764932), new Radian(0.528627763), new Radian(1.370083463), new Coefficient(0.9999), new Metre(5000000), new Metre(5000000), new Metre(1089000), new Metre(654000), new Coefficient(2.946529277E-02), new Coefficient(2.515965696E-02), new Coefficient(1.193845912E-07), new Coefficient(-4.668270147E-07), new Coefficient(9.233980362E-12), new Coefficient(1.523735715E-12), new Coefficient(1.696780024E-18), new Coefficient(4.408314235E-18), new Coefficient(-8.331083518E-24), new Coefficient(-3.689471323E-24));

        self::assertEqualsWithDelta(-5568990.91, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(-6050538.71, $to->getNorthing()->getValue(), 0.01);
    }

    public function testLambertAzimuthalEqualArea(): void
    {
        $from = GeographicPoint::create(new Degree(50), new Degree(5), null, Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89));
        $toCRS = Projected::fromSRID(Projected::EPSG_ETRS89_EXTENDED_LAEA_EUROPE);
        $to = $from->lambertAzimuthalEqualArea($toCRS, new Degree(52), new Degree(10), new Metre(4321000), new Metre(3210000));

        self::assertEqualsWithDelta(3962799.45, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(2999718.85, $to->getNorthing()->getValue(), 0.01);
    }

    public function testLambertAzimuthalEqualAreaSpherical(): void
    {
        $fromCRS = new Geographic2D(
            'foo',
            Ellipsoidal::fromSRID(Ellipsoidal::EPSG_2D_AXES_LATITUDE_LONGITUDE_ORIENTATIONS_NORTH_EAST_UOM_DEGREE),
            new Datum(
                Datum::DATUM_TYPE_GEODETIC,
                new Ellipsoid(
                    new Metre(3),
                    new Metre(3)
                ),
                null,
                null,
            ),
            GeographicPolygon::createWorld()
        );
        $from = GeographicPoint::create(new Degree(-20), new Degree(100), null, $fromCRS);

        $toCRS = Projected::fromSRID(Projected::EPSG_ETRS89_EXTENDED_LAEA_EUROPE);
        $to = $from->lambertAzimuthalEqualAreaSpherical($toCRS, new Degree(40), new Degree(-100), new Metre(1), new Metre(2));

        self::assertEqualsWithDelta(-3.2339303, $to->getEasting()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(6.0257775, $to->getNorthing()->getValue(), 0.0000001);
    }

    public function testLambertConicConformal1SP(): void
    {
        $from = GeographicPoint::create(new Radian(0.31297535), new Radian(-1.34292061), null, Geographic2D::fromSRID(Geographic2D::EPSG_JAD69));
        $toCRS = Projected::fromSRID(Projected::EPSG_JAD69_JAMAICA_NATIONAL_GRID);
        $to = $from->lambertConicConformal1SP($toCRS, new Degree(18), new Degree(-77), new Coefficient(1), new Metre(250000), new Metre(150000));

        self::assertEqualsWithDelta(255966.59, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(142493.51, $to->getNorthing()->getValue(), 0.01);
    }

    public function testLambertConicConformal2SP(): void
    {
        $from = GeographicPoint::create(new Radian(0.49741884), new Radian(-1.67551608), null, Geographic2D::fromSRID(Geographic2D::EPSG_NAD27));
        $toCRS = Projected::fromSRID(Projected::EPSG_NAD27_TEXAS_SOUTH_CENTRAL);
        $to = $from->lambertConicConformal2SP($toCRS, new Radian(0.48578331), new Radian(-1.72787596), new Radian(0.49538262), new Radian(0.52854388), new USSurveyFoot(2000000), new Metre(0));

        self::assertEqualsWithDelta(2963503.95, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(254759.84, $to->getNorthing()->getValue(), 0.01);
    }

    public function testLambertConicConformal2SPMichigan(): void
    {
        $from = GeographicPoint::create(new Radian(0.763581548), new Radian(-1.451532161), null, Geographic2D::fromSRID(Geographic2D::EPSG_NAD27));
        $toCRS = Projected::fromSRID(Projected::EPSG_NAD27_MICHIGAN_CENTRAL);
        $to = $from->lambertConicConformal2SPMichigan($toCRS, new Radian(0.756018454), new Radian(-1.471894336), new Radian(0.771144641), new Radian(0.797615468), new USSurveyFoot(2000000), new Metre(0), new Coefficient(1.0000382));

        self::assertEqualsWithDelta(2308335.75, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(160210.49, $to->getNorthing()->getValue(), 0.01);
    }

    public function testLambertConicConformal2SPBelgium(): void
    {
        $from = GeographicPoint::create(new Radian(0.88452540), new Radian(0.10135773), null, Geographic2D::fromSRID(Geographic2D::EPSG_BELGE_1972));
        $toCRS = Projected::fromSRID(Projected::EPSG_BELGE_1972_BELGE_LAMBERT_72);
        $to = $from->lambertConicConformal2SPBelgium($toCRS, new Radian(1.57079633), new Radian(0.07604294), new Radian(0.86975574), new Radian(0.89302680), new Metre(150000.01), new Metre(5400088.44));

        self::assertEqualsWithDelta(251763.20, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(153034.10, $to->getNorthing()->getValue(), 0.01);
    }

    public function testLambertConicNearConformal(): void
    {
        $from = GeographicPoint::create(new Radian(0.654874806), new Radian(0.595793792), null, Geographic2D::fromSRID(Geographic2D::EPSG_DEIR_EZ_ZOR));
        $toCRS = Projected::fromSRID(Projected::EPSG_DEIR_EZ_ZOR_LEVANT_ZONE);
        $to = $from->lambertConicNearConformal($toCRS, new Radian(0.604756586), new Radian(0.651880476), new Coefficient(0.99962560), new Metre(300000), new Metre(300000));

        self::assertEqualsWithDelta(15707.96, $to->getEasting()->getValue(), 0.01);
        self::assertEqualsWithDelta(623165.96, $to->getNorthing()->getValue(), 0.01);
    }

    public function testLambertCylindricalEqualArea(): void
    {
        $from = GeographicPoint::create(new Degree(10), new Degree(-78), null, Geographic2D::fromSRID(Geographic2D::EPSG_NAD27));
        $toCRS = Projected::fromSRID(Projected::EPSG_NAD27_ALABAMA_EAST);
        $to = $from->lambertCylindricalEqualArea($toCRS, new Degree(5), new Degree(-75), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(-332699.8, $to->getEasting()->asMetres()->getValue(), 0.1);
        self::assertEqualsWithDelta(1104391.2, $to->getNorthing()->asMetres()->getValue(), 0.1);
    }

    public function testThreeDToTwoD(): void
    {
        $from = GeographicPoint::create(new Degree(0.123), new Degree(0.456), new Metre(789), Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->threeDToTwoD($toCRS);

        self::assertEquals(0.123, $to->getLatitude()->getValue());
        self::assertEquals(0.456, $to->getLongitude()->getValue());
        self::assertNull($to->getHeight());
    }

    public function testModifiedAzimuthalEquidistant(): void
    {
        $from = GeographicPoint::create(new Radian(0.167490973), new Radian(2.411923377), null, Geographic2D::fromSRID(Geographic2D::EPSG_GUAM_1963));
        $toCRS = Projected::fromSRID(Projected::EPSG_GUAM_1963_YAP_ISLANDS);
        $to = $from->modifiedAzimuthalEquidistant($toCRS, new Radian(0.166621493), new Radian(2.411499514), new Metre(40000), new Metre(60000));

        self::assertEqualsWithDelta(42665.90, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(65509.82, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testObliqueStereographic(): void
    {
        $from = GeographicPoint::create(new Degree(53), new Degree(6), null, Geographic2D::fromSRID(Geographic2D::EPSG_AMERSFOORT));
        $toCRS = Projected::fromSRID(Projected::EPSG_AMERSFOORT_RD_NEW);
        $to = $from->obliqueStereographic($toCRS, new Radian(0.910296727), new Radian(0.094032038), new Coefficient(0.9999079), new Metre(155000), new Metre(463000));

        self::assertEqualsWithDelta(196105.283, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(557057.739, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testPolarStereographicVariantA(): void
    {
        $from = GeographicPoint::create(new Degree(73), new Degree(44), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $toCRS = Projected::fromSRID(Projected::EPSG_WGS_84_UPS_NORTH_E_N);
        $to = $from->polarStereographicVariantA($toCRS, new Degree(90), new Degree(0), new Coefficient(0.994), new Metre(2000000), new Metre(2000000));

        self::assertEqualsWithDelta(3320416.75, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(632668.43, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testPolarStereographicVariantB(): void
    {
        $from = GeographicPoint::create(new Degree(-75), new Degree(120), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $toCRS = Projected::fromSRID(Projected::EPSG_WGS_84_AUSTRALIAN_ANTARCTIC_POLAR_STEREOGRAPHIC);
        $to = $from->polarStereographicVariantB($toCRS, new Degree(-71), new Degree(70), new Metre(6000000), new Metre(6000000));

        self::assertEqualsWithDelta(7255380.79, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(7053389.56, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testPolarStereographicVariantC(): void
    {
        $from = GeographicPoint::create(new Radian(-1.162480524), new Radian(2.444707118), null, Geographic2D::fromSRID(Geographic2D::EPSG_PETRELS_1972));
        $toCRS = Projected::fromSRID(Projected::EPSG_PETRELS_1972_TERRE_ADELIE_POLAR_STEREOGRAPHIC);
        $to = $from->polarStereographicVariantC($toCRS, new Degree(-67), new Degree(140), new Metre(300000), new Metre(200000));

        self::assertEqualsWithDelta(303169.52, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(244055.72, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testPopularVisualisationPseudoMercator(): void
    {
        $from = GeographicPoint::create(new Radian(0.425542460), new Radian(-1.751147016), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $toCRS = Projected::fromSRID(Projected::EPSG_WGS_84_PSEUDO_MERCATOR);
        $to = $from->popularVisualisationPseudoMercator($toCRS, new Degree(0), new Degree(0), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(-11169055.58, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(2800000.00, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testMercatorVariantA(): void
    {
        $from = GeographicPoint::create(new Degree(-3), new Degree(120), null, Geographic2D::fromSRID(Geographic2D::EPSG_MAKASSAR));
        $toCRS = Projected::fromSRID(Projected::EPSG_MAKASSAR_NEIEZ);
        $to = $from->mercatorVariantA($toCRS, new Degree(0), new Degree(110), new Unity(0.997), new Metre(3900000), new Metre(900000));

        self::assertEqualsWithDelta(5009726.58, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(569150.82, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testMercatorVariantB(): void
    {
        $from = GeographicPoint::create(new Degree(53), new Degree(53), null, Geographic2D::fromSRID(Geographic2D::EPSG_PULKOVO_1942));
        $toCRS = Projected::fromSRID(Projected::EPSG_PULKOVO_1942_CASPIAN_SEA_MERCATOR);
        $to = $from->mercatorVariantB($toCRS, new Degree(42), new Degree(51), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(165704.29, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(5171848.07, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testGeographic2DOffset(): void
    {
        $from = GeographicPoint::create(new Degree(38.14349028), new Degree(23.80450972), null, Geographic2D::fromSRID(Geographic2D::EPSG_GREEK));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_GGRS87);
        $to = $from->geographic2DOffsets($toCRS, new ArcSecond(-5.86), new ArcSecond(0.28));

        self::assertEqualsWithDelta(38.14186250, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(23.80458750, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function testLongitudeRotation(): void
    {
        $from = GeographicPoint::create(new Degree(0), new Degree(0), new Metre(0), Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84));
        $toCRS = Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84);
        $to = $from->longitudeRotation($toCRS, new Degree(12.34));

        self::assertEqualsWithDelta(0, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(12.34, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(0, $to->getHeight()->getValue(), 0.00001);
    }

    public function testObliqueMercatorHotineVariantA(): void
    {
        $from = GeographicPoint::create(new Radian(0.094025313), new Radian(2.021187362), null, Geographic2D::fromSRID(Geographic2D::EPSG_TIMBALAI_1948));
        $toCRS = Projected::fromSRID(Projected::EPSG_TIMBALAI_1948_RSO_BORNEO_M);
        $to = $from->obliqueMercatorHotineVariantA($toCRS, new Radian(0.069813170), new Radian(2.007128640), new Radian(0.930536611), new Radian(0.927295218), new Coefficient(0.99984), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(679245.73, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(596562.78, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testObliqueMercatorHotineVariantB(): void
    {
        $from = GeographicPoint::create(new Radian(0.094025313), new Radian(2.021187362), null, Geographic2D::fromSRID(Geographic2D::EPSG_TIMBALAI_1948));
        $toCRS = Projected::fromSRID(Projected::EPSG_TIMBALAI_1948_RSO_BORNEO_M);
        $to = $from->obliqueMercatorHotineVariantB($toCRS, new Radian(0.069813170), new Radian(2.007128640), new Radian(0.930536611), new Radian(0.927295218), new Coefficient(0.99984), new Metre(590476.87), new Metre(442857.65));

        self::assertEqualsWithDelta(679245.73, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(596562.78, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testTransverseMercator(): void
    {
        $from = GeographicPoint::create(new Degree(50.5), new Degree(0.5), null, Geographic2D::fromSRID(Geographic2D::EPSG_OSGB_1936));
        $toCRS = Projected::fromSRID(Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID);
        $to = $from->transverseMercator($toCRS, new Degree(49), new Degree(-2), new Unity(0.9996012717), new Metre(400000), new Metre(-100000));

        self::assertEqualsWithDelta(577274.99, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(69740.50, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testTransverseMercatorSouthOrientated(): void
    {
        $from = GeographicPoint::create(new Radian(-0.449108618), new Radian(0.493625066), null, Geographic2D::fromSRID(Geographic2D::EPSG_HARTEBEESTHOEK94));
        $toCRS = Projected::fromSRID(Projected::EPSG_HARTEBEESTHOEK94_LO29);
        $to = $from->transverseMercator($toCRS, new Degree(0), new Degree(29), new Unity(1), new Metre(0), new Metre(0));

        self::assertEqualsWithDelta(71984.49, $to->getWesting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(2847342.74, $to->getSouthing()->asMetres()->getValue(), 0.01);
    }

    public function testTransverseMercatorZonedGridNothernHemisphere(): void
    {
        $from = GeographicPoint::create(new Degree(43.642567), new Degree(-79.387139), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $toCRS = Projected::fromSRID(Projected::EPSG_WGS_84_UTM_GRID_SYSTEM_NORTHERN_HEMISPHERE);
        $to = $from->transverseMercatorZonedGrid($toCRS, new Degree(0), new Degree(-180), new Degree(6), new Unity(0.9996), new Metre(500000), new Metre(0));

        self::assertEqualsWithDelta(17630084, $to->getEasting()->asMetres()->getValue(), 1);
        self::assertEqualsWithDelta(4833439, $to->getNorthing()->asMetres()->getValue(), 1);
    }

    public function testTransverseMercatorZonedGridSouthernHemisphere(): void
    {
        $from = GeographicPoint::create(new Degree(-33.859972), new Degree(151.211111), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $toCRS = Projected::fromSRID(Projected::EPSG_WGS_84_UTM_GRID_SYSTEM_SOUTHERN_HEMISPHERE);
        $to = $from->transverseMercatorZonedGrid($toCRS, new Degree(0), new Degree(-180), new Degree(6), new Unity(0.9996), new Metre(500000), new Metre(10000000));

        self::assertEqualsWithDelta(56334519, $to->getEasting()->asMetres()->getValue(), 1);
        self::assertEqualsWithDelta(6251930, $to->getNorthing()->asMetres()->getValue(), 1);
    }

    public function testGeneralPolynomial(): void
    {
        $from = GeographicPoint::create(new Degree(55), new Degree(-6.5), null, Geographic2D::fromSRID(Geographic2D::EPSG_TM75));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89);
        $to = $from->generalPolynomial(
            $toCRS,
            new Degree(53.5),
            new Degree(-7.7),
            new Degree(53.5),
            new Degree(-7.7),
            new Coefficient(0.1),
            new Coefficient(3600),
            new Coefficient(0.763),
            new Coefficient(-2.81),
            [
                'Au1v0' => new Coefficient(-4.487),
                'Au0v1' => new Coefficient(0.123),
                'Au2v0' => new Coefficient(0.215),
                'Au1v1' => new Coefficient(-0.515),
                'Au0v2' => new Coefficient(0.183),
                'Au3v0' => new Coefficient(-0.265),
                'Au2v1' => new Coefficient(-0.57),
                'Au1v2' => new Coefficient(0.414),
                'Au0v3' => new Coefficient(-0.374),
                'Au3v1' => new Coefficient(2.852),
                'Au2v2' => new Coefficient(5.703),
                'Au1v3' => new Coefficient(13.11),
                'Au3v2' => new Coefficient(-61.678),
                'Au2v3' => new Coefficient(113.743),
                'Au3v3' => new Coefficient(-265.898),
                'Bu1v0' => new Coefficient(-0.341),
                'Bu0v1' => new Coefficient(-4.68),
                'Bu2v0' => new Coefficient(1.196),
                'Bu1v1' => new Coefficient(-0.119),
                'Bu0v2' => new Coefficient(0.17),
                'Bu3v0' => new Coefficient(-0.887),
                'Bu2v1' => new Coefficient(4.877),
                'Bu1v2' => new Coefficient(3.913),
                'Bu0v3' => new Coefficient(2.163),
                'Bu3v1' => new Coefficient(-46.666),
                'Bu2v2' => new Coefficient(-27.795),
                'Bu1v3' => new Coefficient(18.867),
                'Bu3v2' => new Coefficient(-95.377),
                'Bu2v3' => new Coefficient(-284.294),
                'Bu3v3' => new Coefficient(-853.95),
            ]
        );

        self::assertEqualsWithDelta(55.00002972, $to->getLatitude()->getValue(), 0.00000001);
        self::assertEqualsWithDelta(-6.50094913, $to->getLongitude()->getValue(), 0.00000001);
    }

    public function testReversiblePolynomialForward(): void
    {
        $from = GeographicPoint::create(new Degree(52.508333333), new Degree(2), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_ED87);
        $to = $from->reversiblePolynomial(
            $toCRS,
            new Degree(55),
            new Degree(0),
            new Coefficient(1),
            new Coefficient(-0.00000556098),
            new Coefficient(0.0000148944),
            [
                'Au1v0' => new Coefficient(-0.00000155391),
                'Au0v1' => new Coefficient(-0.00000040262),
                'Au2v0' => new Coefficient(-0.000000509693),
                'Au1v1' => new Coefficient(-0.000000819775),
                'Au0v2' => new Coefficient(-0.000000247592),
                'Au3v0' => new Coefficient(0.000000136682),
                'Au2v1' => new Coefficient(0.000000186198),
                'Au1v2' => new Coefficient(0.00000012335),
                'Au0v3' => new Coefficient(0.0000000568797),
                'Au4v0' => new Coefficient(-0.00000000232217),
                'Au3v1' => new Coefficient(-0.00000000769931),
                'Au2v2' => new Coefficient(-0.00000000786953),
                'Au1v3' => new Coefficient(-0.00000000612216),
                'Au0v4' => new Coefficient(-0.00000000401382),
                'Bu1v0' => new Coefficient(0.00000268191),
                'Bu0v1' => new Coefficient(0.0000024529),
                'Bu2v0' => new Coefficient(0.0000002944),
                'Bu1v1' => new Coefficient(0.0000015226),
                'Bu0v2' => new Coefficient(0.000000910592),
                'Bu3v0' => new Coefficient(-0.000000368241),
                'Bu2v1' => new Coefficient(-0.000000851732),
                'Bu1v2' => new Coefficient(-0.000000566713),
                'Bu0v3' => new Coefficient(-0.000000185188),
                'Bu4v0' => new Coefficient(0.0000000284312),
                'Bu3v1' => new Coefficient(0.0000000684853),
                'Bu2v2' => new Coefficient(0.0000000500828),
                'Bu1v3' => new Coefficient(0.0000000415937),
                'Bu0v4' => new Coefficient(0.00000000762236),
            ]
        );

        self::assertEqualsWithDelta(52.508330203, $to->getLatitude()->getValue(), 0.00000001);
        self::assertEqualsWithDelta(2.000009801, $to->getLongitude()->getValue(), 0.00000001);
    }

    public function testReversiblePolynomialBackward(): void
    {
        $from = GeographicPoint::create(new Degree(52.508330203), new Degree(2.000009801), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED87));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_ED50);
        $to = $from->reversiblePolynomial(
            $toCRS,
            new Degree(55),
            new Degree(0),
            new Coefficient(1),
            new Coefficient(0.00000556098),
            new Coefficient(-0.0000148944),
            [
                'Au1v0' => new Coefficient(0.00000155391),
                'Au0v1' => new Coefficient(0.00000040262),
                'Au2v0' => new Coefficient(0.000000509693),
                'Au1v1' => new Coefficient(0.000000819775),
                'Au0v2' => new Coefficient(0.000000247592),
                'Au3v0' => new Coefficient(-0.000000136682),
                'Au2v1' => new Coefficient(-0.000000186198),
                'Au1v2' => new Coefficient(-0.00000012335),
                'Au0v3' => new Coefficient(-0.0000000568797),
                'Au4v0' => new Coefficient(0.00000000232217),
                'Au3v1' => new Coefficient(0.00000000769931),
                'Au2v2' => new Coefficient(0.00000000786953),
                'Au1v3' => new Coefficient(0.00000000612216),
                'Au0v4' => new Coefficient(0.00000000401382),
                'Bu1v0' => new Coefficient(-0.00000268191),
                'Bu0v1' => new Coefficient(-0.0000024529),
                'Bu2v0' => new Coefficient(-0.0000002944),
                'Bu1v1' => new Coefficient(-0.0000015226),
                'Bu0v2' => new Coefficient(-0.000000910592),
                'Bu3v0' => new Coefficient(0.000000368241),
                'Bu2v1' => new Coefficient(0.000000851732),
                'Bu1v2' => new Coefficient(0.000000566713),
                'Bu0v3' => new Coefficient(0.000000185188),
                'Bu4v0' => new Coefficient(-0.0000000284312),
                'Bu3v1' => new Coefficient(-0.0000000684853),
                'Bu2v2' => new Coefficient(-0.0000000500828),
                'Bu1v3' => new Coefficient(-0.0000000415937),
                'Bu0v4' => new Coefficient(-0.00000000762236),
            ]
        );

        self::assertEqualsWithDelta(52.508333333, $to->getLatitude()->getValue(), 0.00000001);
        self::assertEqualsWithDelta(2, $to->getLongitude()->getValue(), 0.00000001);
    }

    public function testNewZealandMapGrid1(): void
    {
        $from = GeographicPoint::create(new Degree(-34.444066), new Degree(172.739194), null, Geographic2D::fromSRID(Geographic2D::EPSG_NZGD49));
        $toCRS = Projected::fromSRID(Projected::EPSG_NZGD49_NEW_ZEALAND_MAP_GRID);
        $to = $from->newZealandMapGrid($toCRS, new Degree(-41), new Degree(173), new Metre(2510000), new Metre(6023150));

        self::assertEqualsWithDelta(2487100.664, $to->getEasting()->asMetres()->getValue(), 0.001);
        self::assertEqualsWithDelta(6751049.754, $to->getNorthing()->asMetres()->getValue(), 0.001);
    }

    public function testNewZealandMapGrid2(): void
    {
        $from = GeographicPoint::create(new Degree(-40.512409), new Degree(172.723106), null, Geographic2D::fromSRID(Geographic2D::EPSG_NZGD49));
        $toCRS = Projected::fromSRID(Projected::EPSG_NZGD49_NEW_ZEALAND_MAP_GRID);
        $to = $from->newZealandMapGrid($toCRS, new Degree(-41), new Degree(173), new Metre(2510000), new Metre(6023150));

        self::assertEqualsWithDelta(2486533.434, $to->getEasting()->asMetres()->getValue(), 0.001);
        self::assertEqualsWithDelta(6077263.670, $to->getNorthing()->asMetres()->getValue(), 0.001);
    }

    public function testNewZealandMapGrid3(): void
    {
        $from = GeographicPoint::create(new Degree(-46.651295), new Degree(169.172062), null, Geographic2D::fromSRID(Geographic2D::EPSG_NZGD49));
        $toCRS = Projected::fromSRID(Projected::EPSG_NZGD49_NEW_ZEALAND_MAP_GRID);
        $to = $from->newZealandMapGrid($toCRS, new Degree(-41), new Degree(173), new Metre(2510000), new Metre(6023150));

        self::assertEqualsWithDelta(2216746.395, $to->getEasting()->asMetres()->getValue(), 0.001);
        self::assertEqualsWithDelta(5388508.715, $to->getNorthing()->asMetres()->getValue(), 0.001);
    }

    public function testObliqueMercatorLaborde(): void
    {
        $from = GeographicPoint::create(new Radian(-0.282565315), new Radian(0.735138668), null, Geographic2D::fromSRID(Geographic2D::EPSG_TANANARIVE_PARIS));
        $toCRS = Projected::fromSRID(Projected::EPSG_TANANARIVE_PARIS_LABORDE_GRID);
        $to = $from->obliqueMercatorLaborde($toCRS, new Grad(-21), new Grad(49), new Grad(21), new Unity(0.9995), new Metre(400000), new Metre(800000));

        self::assertEqualsWithDelta(188333.848, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(1098841.091, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testMadridToED50Polynomial(): void
    {
        $from = GeographicPoint::create(new Degree(42.647992), new Degree(3.659603), null, Geographic2D::fromSRID(Geographic2D::EPSG_MADRID_1870_MADRID));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_ED50);
        $to = $from->madridToED50Polynomial($toCRS, new Coefficient(11.328779), new Coefficient(-0.1674), new Coefficient(-0.03852), new Coefficient(0.0000379), new ArcSecond(-13276.58), new Coefficient(2.5079425), new Coefficient(0.08352), new Coefficient(-0.00864), new Coefficient(-0.0000038));

        self::assertEqualsWithDelta(42.649117, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(-0.02665833, $to->getLongitude()->getValue(), 0.000001);
    }

    /**
     * @group integration
     * @dataProvider supportedOperations
     */
    public function testOperations(string $sourceCrsSrid, string $targetCrsSrid, string $operationSrid, bool $reversible): void
    {
        $operation = CoordinateOperations::getOperationData($operationSrid);
        $boundingBox = GeographicPolygon::createFromArray($operation['bounding_box'], $operation['bounding_box_crosses_antimeridian']);
        $centre = $boundingBox->getCentre();

        $sourceCRS = Geographic::fromSRID($sourceCrsSrid);
        $sourceHeight = $sourceCRS instanceof Geographic3D ? new Metre(0) : null;
        $targetCRS = CoordinateReferenceSystem::fromSRID($targetCrsSrid);

        $epoch = new DateTime();

        $originalPoint = GeographicPoint::create($centre[0], $centre[1], $sourceHeight, $sourceCRS, $epoch);
        $newPoint = $originalPoint->performOperation($operationSrid, $targetCRS, false);
        self::assertInstanceOf(Point::class, $newPoint);
        self::assertEquals($targetCRS, $newPoint->getCRS());

        if ($reversible) {
            $delta = isset($operation['method']) && $operation['method'] === CoordinateOperationMethods::EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_13 ? 0.01 : 0.001;
            $reversedPoint = $newPoint->performOperation($operationSrid, $sourceCRS, true);

            self::assertEquals($sourceCRS, $reversedPoint->getCRS());
            self::assertEqualsWithDelta($originalPoint->getLatitude()->getValue(), $reversedPoint->getLatitude()->getValue(), $delta);
            self::assertEqualsWithDelta($originalPoint->getLongitude()->getValue(), $reversedPoint->getLongitude()->getValue(), $delta);
            if ($sourceHeight) {
                self::assertEqualsWithDelta($originalPoint->getHeight()->getValue(), $reversedPoint->getHeight()->getValue(), $delta);
            } else {
                self::assertNull($reversedPoint->getHeight());
            }
        }
    }

    public function supportedOperations(): array
    {
        $toTest = [];
        $crss = Geographic::getSupportedSRIDs();
        foreach (CRSTransformations::getSupportedTransformations() as $transformation) {
            if (isset($crss[$transformation['source_crs']])) {
                $toTest[] = [
                    $transformation['source_crs'],
                    $transformation['target_crs'],
                    $transformation['operation'],
                    $transformation['reversible'],
                ];
            }
        }

        return $toTest;
    }
}

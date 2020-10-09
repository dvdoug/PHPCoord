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
}

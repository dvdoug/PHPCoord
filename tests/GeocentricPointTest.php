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
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use PHPUnit\Framework\TestCase;

class GeocentricPointTest extends TestCase
{
    public function test(): void
    {
        $object = GeocentricPoint::create(new Metre(123), new Metre(456), new Metre(789), CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84));
        self::assertEquals(123, $object->getX()->getValue());
        self::assertEquals(456, $object->getY()->getValue());
        self::assertEquals(789, $object->getZ()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::4978', $object->getCRS()->getSrid());
        self::assertNull($object->getCoordinateEpoch());
        self::assertEquals('(123, 456, 789)', $object->__toString());
    }

    public function testWithEpochDateTime(): void
    {
        $object = GeocentricPoint::create(new Metre(123), new Metre(456), new Metre(789), CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84), new DateTime('2003-02-01'));
        self::assertEquals(123, $object->getX()->getValue());
        self::assertEquals(456, $object->getY()->getValue());
        self::assertEquals(789, $object->getZ()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::4978', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123, 456, 789)', $object->__toString());
    }

    public function testWithEpochDateTimeImmutable(): void
    {
        $object = GeocentricPoint::create(new Metre(123), new Metre(456), new Metre(789), CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84), new DateTimeImmutable('2003-02-01'));
        self::assertEquals(123, $object->getX()->getValue());
        self::assertEquals(456, $object->getY()->getValue());
        self::assertEquals(789, $object->getZ()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::4978', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123, 456, 789)', $object->__toString());
    }

    public function testWithFeetAsUnits(): void
    {
        $object = GeocentricPoint::create(UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), UnitOfMeasureFactory::makeUnit(123, UnitOfMeasure::EPSG_LENGTH_FOOT), CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84));
        self::assertEquals(37.4904, $object->getX()->getValue());
        self::assertEquals(37.4904, $object->getY()->getValue());
        self::assertEquals(37.4904, $object->getZ()->getValue());
    }

    public function testDistanceCalculation(): void
    {
        $from = GeocentricPoint::create(new Metre(12300), new Metre(45600), new Metre(78900), CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84));
        $to = GeocentricPoint::create(new Metre(24600), new Metre(80200), new Metre(16800), CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84));
        self::assertEqualsWithDelta(72144.715676, $from->calculateDistance($to)->getValue(), 0.000001);
    }

    public function testGeographicGeocentric(): void
    {
        $from = GeocentricPoint::create(new Metre(3771793.968), new Metre(140253.342), new Metre(5124304.349), CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84));
        $to = $from->geographicGeocentric(CoordinateReferenceSystem::fromSRID(Geographic3D::EPSG_WGS_84));

        self::assertEqualsWithDelta(53.80939444, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(2.12955000, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(73, $to->getHeight()->getValue(), 0.0001);
    }

    public function testHelmertOSWorkedExamplePositionVectorTransformation(): void
    {
        $tx = new Metre(-446.448);
        $ty = new Metre(125.157);
        $tz = new Metre(-542.060);
        $s = new Unity(0.0000204894);
        $rx = new ArcSecond(-0.1502);
        $ry = new ArcSecond(-0.2470);
        $rz = new ArcSecond(-0.8421);

        $crs = CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84); // reuse for from/to here as checking numbers only

        $from = GeocentricPoint::create(new Metre(3790644.900), new Metre(-110149.210), new Metre(5111482.970), $crs);
        $new = $from->positionVectorTransformation($crs, $tx, $ty, $tz, $rx, $ry, $rz, $s);

        self::assertEqualsWithDelta(3790269.549, $new->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(-110038.064, $new->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(5111050.261, $new->getZ()->getValue(), 0.001);
    }

    public function testHelmertOSWorkedExample2PositionVectorTransformation(): void
    {
        $tx = new Metre(-446.448);
        $ty = new Metre(125.157);
        $tz = new Metre(-542.060);
        $s = new Unity(0.0000204894);
        $rx = new ArcSecond(-0.1502);
        $ry = new ArcSecond(-0.2470);
        $rz = new ArcSecond(-0.8421);

        $crs = CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84); // reuse for from/to here as checking numbers only

        $from = GeocentricPoint::create(new Metre(3909833.018), new Metre(-147097.138), new Metre(5020322.478), $crs);
        $new = $from->positionVectorTransformation($crs, $tx, $ty, $tz, $rx, $ry, $rz, $s);

        self::assertEqualsWithDelta(3909460.068, $new->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(-146987.302, $new->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(5019888.070, $new->getZ()->getValue(), 0.001);
    }

    public function testHelmertOSWorkedExampleCoordinateFrameRotation(): void
    {
        $tx = new Metre(-446.448);
        $ty = new Metre(125.157);
        $tz = new Metre(-542.060);
        $s = new Unity(0.0000204894);
        $rx = new ArcSecond(0.1502);
        $ry = new ArcSecond(0.2470);
        $rz = new ArcSecond(0.8421);

        $crs = CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84); // reuse for from/to here as checking numbers only

        $from = GeocentricPoint::create(new Metre(3790644.900), new Metre(-110149.210), new Metre(5111482.970), $crs);
        $new = $from->coordinateFrameRotation($crs, $tx, $ty, $tz, $rx, $ry, $rz, $s);

        self::assertEqualsWithDelta(3790269.549, $new->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(-110038.064, $new->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(5111050.261, $new->getZ()->getValue(), 0.001);
    }

    public function testHelmertOSWorkedExample2CoordinateFrameRotation(): void
    {
        $tx = new Metre(-446.448);
        $ty = new Metre(125.157);
        $tz = new Metre(-542.060);
        $s = new Unity(0.0000204894);
        $rx = new ArcSecond(0.1502);
        $ry = new ArcSecond(0.2470);
        $rz = new ArcSecond(0.8421);

        $crs = CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84); // reuse for from/to here as checking numbers only

        $from = GeocentricPoint::create(new Metre(3909833.018), new Metre(-147097.138), new Metre(5020322.478), $crs);
        $new = $from->coordinateFrameRotation($crs, $tx, $ty, $tz, $rx, $ry, $rz, $s);

        self::assertEqualsWithDelta(3909460.068, $new->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(-146987.302, $new->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(5019888.070, $new->getZ()->getValue(), 0.001);
    }

    public function testCoordinateFrameRotation(): void
    {
        $from = GeocentricPoint::create(new Metre(3657660.66), new Metre(255768.55), new Metre(5201382.11), CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_72));
        $toCRS = CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->coordinateFrameRotation($toCRS, new Metre(0), new Metre(0), new Metre(4.5), new ArcSecond(0), new ArcSecond(0), new ArcSecond(-0.554), UnitOfMeasureFactory::makeUnit(0.219, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION));

        self::assertEqualsWithDelta(3657660.78, $to->getX()->getValue(), 0.01);
        self::assertEqualsWithDelta(255778.43, $to->getY()->getValue(), 0.01);
        self::assertEqualsWithDelta(5201387.75, $to->getZ()->getValue(), 0.01);
    }

    public function testPositionVectorTransformation(): void
    {
        $from = GeocentricPoint::create(new Metre(3657660.66), new Metre(255768.55), new Metre(5201382.11), CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_72));
        $toCRS = CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->positionVectorTransformation($toCRS, new Metre(0), new Metre(0), new Metre(4.5), new ArcSecond(0), new ArcSecond(0), new ArcSecond(0.554), UnitOfMeasureFactory::makeUnit(0.219, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION));

        self::assertEqualsWithDelta(3657660.78, $to->getX()->getValue(), 0.01);
        self::assertEqualsWithDelta(255778.43, $to->getY()->getValue(), 0.01);
        self::assertEqualsWithDelta(5201387.75, $to->getZ()->getValue(), 0.01);
    }

    public function testCoordinateFrameMolodenskyBadekas(): void
    {
        $from = GeocentricPoint::create(new Metre(2550408.96), new Metre(-5749912.26), new Metre(1054891.11), CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_LGD2006));
        $toCRS = CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->coordinateFrameMolodenskyBadekas($toCRS, new Metre(-270.933), new Metre(115.599), new Metre(-360.226), new ArcSecond(-5.266), new ArcSecond(-1.238), new ArcSecond(2.381), UnitOfMeasureFactory::makeUnit(-5.109, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION), new Metre(2464351.59), new Metre(-5783466.61), new Metre(974809.81));

        self::assertEqualsWithDelta(2550138.467, $to->getX()->getValue(), 0.1);
        self::assertEqualsWithDelta(-5749799.862, $to->getY()->getValue(), 0.1);
        self::assertEqualsWithDelta(1054530.826, $to->getZ()->getValue(), 0.1);
    }

    public function testPositionVectorMolodenskyBadekas(): void
    {
        $from = GeocentricPoint::create(new Metre(2550408.96), new Metre(-5749912.26), new Metre(1054891.11), CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_LGD2006));
        $toCRS = CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->positionVectorMolodenskyBadekas($toCRS, new Metre(-270.933), new Metre(115.599), new Metre(-360.226), new ArcSecond(5.266), new ArcSecond(1.238), new ArcSecond(-2.381), UnitOfMeasureFactory::makeUnit(-5.109, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION), new Metre(2464351.59), new Metre(-5783466.61), new Metre(974809.81));

        self::assertEqualsWithDelta(2550138.467, $to->getX()->getValue(), 0.1);
        self::assertEqualsWithDelta(-5749799.862, $to->getY()->getValue(), 0.1);
        self::assertEqualsWithDelta(1054530.826, $to->getZ()->getValue(), 0.1);
    }

    public function testGeocentricTranslation(): void
    {
        $from = GeocentricPoint::create(new Metre(3771793.97), new Metre(140253.34), new Metre(5124304.35), CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84));
        $toCRS = CoordinateReferenceSystem::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->geocentricTranslation($toCRS, new Metre(84.87), new Metre(96.49), new Metre(116.95));

        self::assertEqualsWithDelta(3771878.84, $to->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(140349.83, $to->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(5124421.30, $to->getZ()->getValue(), 0.001);
    }
}

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
use InvalidArgumentException;
use PHPCoord\CoordinateOperation\CoordinateOperationMethods;
use PHPCoord\CoordinateOperation\CoordinateOperationParams;
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateOperation\CRSTransformations;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\Exception\InvalidCoordinateException;
use PHPCoord\Exception\UnknownConversionException;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Length\Foot;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Rate;
use PHPCoord\UnitOfMeasure\Scale\PartsPerMillion;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use PHPCoord\UnitOfMeasure\Time\Year;
use PHPUnit\Framework\TestCase;

class GeocentricPointTest extends TestCase
{
    public function test(): void
    {
        $object = GeocentricPoint::create(new Metre(123), new Metre(456), new Metre(789), Geocentric::fromSRID(Geocentric::EPSG_WGS_84));
        self::assertEquals(123, $object->getX()->getValue());
        self::assertEquals(456, $object->getY()->getValue());
        self::assertEquals(789, $object->getZ()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::4978', $object->getCRS()->getSrid());
        self::assertNull($object->getCoordinateEpoch());
        self::assertEquals('(123, 456, 789)', $object->__toString());
    }

    public function testWithEpochDateTime(): void
    {
        $object = GeocentricPoint::create(new Metre(123), new Metre(456), new Metre(789), Geocentric::fromSRID(Geocentric::EPSG_WGS_84), new DateTime('2003-02-01'));
        self::assertEquals(123, $object->getX()->getValue());
        self::assertEquals(456, $object->getY()->getValue());
        self::assertEquals(789, $object->getZ()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::4978', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123, 456, 789)', $object->__toString());
    }

    public function testWithEpochDateTimeImmutable(): void
    {
        $object = GeocentricPoint::create(new Metre(123), new Metre(456), new Metre(789), Geocentric::fromSRID(Geocentric::EPSG_WGS_84), new DateTimeImmutable('2003-02-01'));
        self::assertEquals(123, $object->getX()->getValue());
        self::assertEquals(456, $object->getY()->getValue());
        self::assertEquals(789, $object->getZ()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::4978', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123, 456, 789)', $object->__toString());
    }

    public function testWithFeetAsUnits(): void
    {
        $object = GeocentricPoint::create(new Foot(123), new Foot(123), new Foot(123), Geocentric::fromSRID(Geocentric::EPSG_WGS_84));
        self::assertEquals(37.4904, $object->getX()->getValue());
        self::assertEquals(37.4904, $object->getY()->getValue());
        self::assertEquals(37.4904, $object->getZ()->getValue());
    }

    public function testDistanceCalculation(): void
    {
        $from = GeocentricPoint::create(new Metre(12300), new Metre(45600), new Metre(78900), Geocentric::fromSRID(Geocentric::EPSG_WGS_84));
        $to = GeocentricPoint::create(new Metre(24600), new Metre(80200), new Metre(16800), Geocentric::fromSRID(Geocentric::EPSG_WGS_84));
        self::assertEqualsWithDelta(72144.715676, $from->calculateDistance($to)->getValue(), 0.000001);
    }

    public function testDistanceDifferentCRSs(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $from = GeocentricPoint::create(new Metre(12300), new Metre(45600), new Metre(78900), Geocentric::fromSRID(Geocentric::EPSG_WGS_84));
        $to = GeocentricPoint::create(new Metre(24600), new Metre(80200), new Metre(16800), Geocentric::fromSRID(Geocentric::EPSG_PZ_90));
        $from->calculateDistance($to);
    }

    public function testGeographicGeocentric2D(): void
    {
        $from = GeocentricPoint::create(new Metre(3771793.968), new Metre(140253.342), new Metre(5124304.349), Geocentric::fromSRID(Geocentric::EPSG_WGS_84));
        $to = $from->geographicGeocentric(Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));

        self::assertEqualsWithDelta(53.80939444, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(2.12955000, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function testGeographicGeocentric3D(): void
    {
        $from = GeocentricPoint::create(new Metre(3771793.968), new Metre(140253.342), new Metre(5124304.349), Geocentric::fromSRID(Geocentric::EPSG_WGS_84));
        $to = $from->geographicGeocentric(Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84));

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

        $crs = Geocentric::fromSRID(Geocentric::EPSG_WGS_84); // reuse for from/to here as checking numbers only

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

        $crs = Geocentric::fromSRID(Geocentric::EPSG_WGS_84); // reuse for from/to here as checking numbers only

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

        $crs = Geocentric::fromSRID(Geocentric::EPSG_WGS_84); // reuse for from/to here as checking numbers only

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

        $crs = Geocentric::fromSRID(Geocentric::EPSG_WGS_84); // reuse for from/to here as checking numbers only

        $from = GeocentricPoint::create(new Metre(3909833.018), new Metre(-147097.138), new Metre(5020322.478), $crs);
        $new = $from->coordinateFrameRotation($crs, $tx, $ty, $tz, $rx, $ry, $rz, $s);

        self::assertEqualsWithDelta(3909460.068, $new->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(-146987.302, $new->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(5019888.070, $new->getZ()->getValue(), 0.001);
    }

    public function testCoordinateFrameRotation(): void
    {
        $from = GeocentricPoint::create(new Metre(3657660.66), new Metre(255768.55), new Metre(5201382.11), Geocentric::fromSRID(Geocentric::EPSG_WGS_72));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->coordinateFrameRotation($toCRS, new Metre(0), new Metre(0), new Metre(4.5), new ArcSecond(0), new ArcSecond(0), new ArcSecond(-0.554), new PartsPerMillion(0.219));

        self::assertEqualsWithDelta(3657660.78, $to->getX()->getValue(), 0.01);
        self::assertEqualsWithDelta(255778.43, $to->getY()->getValue(), 0.01);
        self::assertEqualsWithDelta(5201387.75, $to->getZ()->getValue(), 0.01);
    }

    public function testPositionVectorTransformation(): void
    {
        $from = GeocentricPoint::create(new Metre(3657660.66), new Metre(255768.55), new Metre(5201382.11), Geocentric::fromSRID(Geocentric::EPSG_WGS_72));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->positionVectorTransformation($toCRS, new Metre(0), new Metre(0), new Metre(4.5), new ArcSecond(0), new ArcSecond(0), new ArcSecond(0.554), new PartsPerMillion(0.219));

        self::assertEqualsWithDelta(3657660.78, $to->getX()->getValue(), 0.01);
        self::assertEqualsWithDelta(255778.43, $to->getY()->getValue(), 0.01);
        self::assertEqualsWithDelta(5201387.75, $to->getZ()->getValue(), 0.01);
    }

    public function testCoordinateFrameMolodenskyBadekas(): void
    {
        $from = GeocentricPoint::create(new Metre(2550408.96), new Metre(-5749912.26), new Metre(1054891.11), Geocentric::fromSRID(Geocentric::EPSG_LGD2006));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->coordinateFrameMolodenskyBadekas($toCRS, new Metre(-270.933), new Metre(115.599), new Metre(-360.226), new ArcSecond(-5.266), new ArcSecond(-1.238), new ArcSecond(2.381), new PartsPerMillion(-5.109), new Metre(2464351.59), new Metre(-5783466.61), new Metre(974809.81));

        self::assertEqualsWithDelta(2550138.467, $to->getX()->getValue(), 0.1);
        self::assertEqualsWithDelta(-5749799.862, $to->getY()->getValue(), 0.1);
        self::assertEqualsWithDelta(1054530.826, $to->getZ()->getValue(), 0.1);
    }

    public function testPositionVectorMolodenskyBadekas(): void
    {
        $from = GeocentricPoint::create(new Metre(2550408.96), new Metre(-5749912.26), new Metre(1054891.11), Geocentric::fromSRID(Geocentric::EPSG_LGD2006));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->positionVectorMolodenskyBadekas($toCRS, new Metre(-270.933), new Metre(115.599), new Metre(-360.226), new ArcSecond(5.266), new ArcSecond(1.238), new ArcSecond(-2.381), new PartsPerMillion(-5.109), new Metre(2464351.59), new Metre(-5783466.61), new Metre(974809.81));

        self::assertEqualsWithDelta(2550138.467, $to->getX()->getValue(), 0.1);
        self::assertEqualsWithDelta(-5749799.862, $to->getY()->getValue(), 0.1);
        self::assertEqualsWithDelta(1054530.826, $to->getZ()->getValue(), 0.1);
    }

    public function testGeocentricTranslation(): void
    {
        $from = GeocentricPoint::create(new Metre(3771793.97), new Metre(140253.34), new Metre(5124304.35), Geocentric::fromSRID(Geocentric::EPSG_WGS_84));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->geocentricTranslation($toCRS, new Metre(84.87), new Metre(96.49), new Metre(116.95));

        self::assertEqualsWithDelta(3771878.84, $to->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(140349.83, $to->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(5124421.30, $to->getZ()->getValue(), 0.001);
    }

    public function testTimeSpecificCoordinateFrameRotationEpochMatching(): void
    {
        $from = GeocentricPoint::create(new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656), Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11), new DateTime('2010-01-01'));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->timeSpecificCoordinateFrameRotation($toCRS, new Metre(-0.003), new Metre(-0.001), new Metre(0), new ArcSecond(0.000019), new ArcSecond(-0.000042), new ArcSecond(0.000002), new Unity(0), new Year(2010.0));

        self::assertEqualsWithDelta(2845455.9734, $to->getX()->getValue(), 0.0001);
        self::assertEqualsWithDelta(2160954.3068, $to->getY()->getValue(), 0.0001);
        self::assertEqualsWithDelta(5265993.2648, $to->getZ()->getValue(), 0.0001);
    }

    public function testTimeSpecificCoordinateFrameRotationEpochNotMatching(): void
    {
        $this->expectException(InvalidCoordinateException::class);
        $this->expectExceptionMessage('This transformation is only valid for epoch 2010, got 2010.01');
        $from = GeocentricPoint::create(new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656), Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11), new DateTime('2010-01-03'));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->timeSpecificCoordinateFrameRotation($toCRS, new Metre(0.003), new Metre(0.001), new Metre(0), new ArcSecond(-0.000019), new ArcSecond(0.000042), new ArcSecond(-0.000002), new Unity(0), new Year(2010.0));
    }

    public function testTimeSpecificCoordinateFrameRotationEpochMissing(): void
    {
        $this->expectException(InvalidCoordinateException::class);
        $this->expectExceptionMessage('This transformation is only valid for epoch 2010, none given');
        $from = GeocentricPoint::create(new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656), Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->timeSpecificCoordinateFrameRotation($toCRS, new Metre(0.003), new Metre(0.001), new Metre(0), new ArcSecond(-0.000019), new ArcSecond(0.000042), new ArcSecond(-0.000002), new Unity(0), new Year(2010.0));
    }

    public function testTimeSpecificPositionVectorTransformationEpochMatching(): void
    {
        $from = GeocentricPoint::create(new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656), Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11), new DateTime('2010-01-01'));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->timeSpecificPositionVectorTransformation($toCRS, new Metre(0.003), new Metre(0.001), new Metre(0), new ArcSecond(0.000019), new ArcSecond(-0.000042), new ArcSecond(0.000002), new Unity(0), new Year(2010.0));

        self::assertEqualsWithDelta(2845455.9772, $to->getX()->getValue(), 0.0001);
        self::assertEqualsWithDelta(2160954.3078, $to->getY()->getValue(), 0.0001);
        self::assertEqualsWithDelta(5265993.2663, $to->getZ()->getValue(), 0.0001);
    }

    public function testTimeSpecificPositionVectorTransformationEpochNotMatching(): void
    {
        $this->expectException(InvalidCoordinateException::class);
        $this->expectExceptionMessage('This transformation is only valid for epoch 2010, got 2010.01');
        $from = GeocentricPoint::create(new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656), Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11), new DateTime('2010-01-03'));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->timeSpecificPositionVectorTransformation($toCRS, new Metre(0.003), new Metre(0.001), new Metre(0), new ArcSecond(0.000019), new ArcSecond(-0.000042), new ArcSecond(0.000002), new Unity(0), new Year(2010.0));
    }

    public function testTimeSpecificPositionVectorTransformationEpochMissing(): void
    {
        $this->expectException(InvalidCoordinateException::class);
        $this->expectExceptionMessage('This transformation is only valid for epoch 2010, none given');
        $from = GeocentricPoint::create(new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656), Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->timeSpecificPositionVectorTransformation($toCRS, new Metre(0.003), new Metre(0.001), new Metre(0), new ArcSecond(0.000019), new ArcSecond(-0.000042), new ArcSecond(0.000002), new Unity(0), new Year(2010.0));
    }

    public function testTimeDependentCoordinateFrameRotationWithEpoch(): void
    {
        $from = GeocentricPoint::create(new Metre(-3789470.710), new Metre(4841770.404), new Metre(-1690893.952), Geocentric::fromSRID(Geocentric::EPSG_ITRF2008), (new Year(2013.90))->asDateTime());
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_GDA94);
        $to = $from->timeDependentCoordinateFrameRotation($toCRS, new Metre(-84.68 / 1000), new Metre(-19.42 / 1000), new Metre(32.01 / 1000), new ArcSecond(-0.4254 / 1000), new ArcSecond(2.2578 / 1000), new ArcSecond(2.4015 / 1000), new PartsPerMillion(0.00971), new Rate(new Metre(1.42 / 1000), new Year(1)), new Rate(new Metre(1.34 / 1000), new Year(1)), new Rate(new Metre(0.90 / 1000), new Year(1)), new Rate(new ArcSecond(1.5461 / 1000), new Year(1)), new Rate(new ArcSecond(1.1820 / 1000), new Year(1)), new Rate(new ArcSecond(1.1551 / 1000), new Year(1)), new Rate(new PartsPerMillion(0.000109), new Year(1)), new Year(1994.0));

        self::assertEqualsWithDelta(-3789470.004, $to->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(4841770.686, $to->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(-1690895.108, $to->getZ()->getValue(), 0.001);
    }

    public function testTimeDependentCoordinateFrameRotationEpochMissing(): void
    {
        $this->expectException(InvalidCoordinateException::class);
        $this->expectExceptionMessage('This transformation requires an epoch, none given');
        $from = GeocentricPoint::create(new Metre(-3789470.710), new Metre(4841770.404), new Metre(-1690893.952), Geocentric::fromSRID(Geocentric::EPSG_ITRF2008));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_GDA94);
        $to = $from->timeDependentCoordinateFrameRotation($toCRS, new Metre(-84.68 / 1000), new Metre(-19.42 / 1000), new Metre(32.01 / 1000), new ArcSecond(-0.4254 / 1000), new ArcSecond(2.2578 / 1000), new ArcSecond(2.4015 / 1000), new PartsPerMillion(0.00971), new Rate(new Metre(1.42 / 1000), new Year(1)), new Rate(new Metre(1.34 / 1000), new Year(1)), new Rate(new Metre(0.90 / 1000), new Year(1)), new Rate(new ArcSecond(1.5461 / 1000), new Year(1)), new Rate(new ArcSecond(1.1820 / 1000), new Year(1)), new Rate(new ArcSecond(1.1551 / 1000), new Year(1)), new Rate(new PartsPerMillion(0.000109), new Year(1)), new Year(1994.0));
    }

    public function testTimeDependentPositionVectorTransformationWithEpoch(): void
    {
        $from = GeocentricPoint::create(new Metre(-3789470.710), new Metre(4841770.404), new Metre(-1690893.952), Geocentric::fromSRID(Geocentric::EPSG_ITRF2008), (new Year(2013.90))->asDateTime());
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_GDA94);
        $to = $from->timeDependentPositionVectorTransformation($toCRS, new Metre(-84.68 / 1000), new Metre(-19.42 / 1000), new Metre(32.01 / 1000), new ArcSecond(0.4254 / 1000), new ArcSecond(-2.2578 / 1000), new ArcSecond(-2.4015 / 1000), new PartsPerMillion(0.00971), new Rate(new Metre(1.42 / 1000), new Year(1)), new Rate(new Metre(1.34 / 1000), new Year(1)), new Rate(new Metre(0.90 / 1000), new Year(1)), new Rate(new ArcSecond(-1.5461 / 1000), new Year(1)), new Rate(new ArcSecond(-1.1820 / 1000), new Year(1)), new Rate(new ArcSecond(-1.1551 / 1000), new Year(1)), new Rate(new PartsPerMillion(0.000109), new Year(1)), new Year(1994.0));

        self::assertEqualsWithDelta(-3789470.004, $to->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(4841770.686, $to->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(-1690895.108, $to->getZ()->getValue(), 0.001);
    }

    public function testTimeDependentPositionVectorTransformationEpochMissing(): void
    {
        $this->expectException(InvalidCoordinateException::class);
        $this->expectExceptionMessage('This transformation requires an epoch, none given');
        $from = GeocentricPoint::create(new Metre(-3789470.710), new Metre(4841770.404), new Metre(-1690893.952), Geocentric::fromSRID(Geocentric::EPSG_ITRF2008));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_GDA94);
        $to = $from->timeDependentPositionVectorTransformation($toCRS, new Metre(-84.68 / 1000), new Metre(-19.42 / 1000), new Metre(32.01 / 1000), new ArcSecond(0.4254 / 1000), new ArcSecond(-2.2578 / 1000), new ArcSecond(-2.4015 / 1000), new PartsPerMillion(0.00971), new Rate(new Metre(1.42 / 1000), new Year(1)), new Rate(new Metre(1.34 / 1000), new Year(1)), new Rate(new Metre(0.90 / 1000), new Year(1)), new Rate(new ArcSecond(-1.5461 / 1000), new Year(1)), new Rate(new ArcSecond(-1.1820 / 1000), new Year(1)), new Rate(new ArcSecond(-1.1551 / 1000), new Year(1)), new Rate(new PartsPerMillion(0.000109), new Year(1)), new Year(1994.0));
    }

    public function testAutoConversionPZ9011ToITRF2008(): void
    {
        $from = GeocentricPoint::create(new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656), Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11), new DateTime('2010-01-01'));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(2845455.9734, $to->getX()->getValue(), 0.0001);
        self::assertEqualsWithDelta(2160954.3068, $to->getY()->getValue(), 0.0001);
        self::assertEqualsWithDelta(5265993.2648, $to->getZ()->getValue(), 0.0001);
    }

    public function testAutoConversionPZ9011ToITRF2008NoEpoch(): void
    {
        $this->expectException(UnknownConversionException::class);
        $from = GeocentricPoint::create(new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656), Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->convert($toCRS);
    }

    /**
     * @group integration
     * @dataProvider supportedOperations
     */
    public function testOperations(string $sourceCrsSrid, string $targetCrsSrid, string $operationSrid, bool $reversible): void
    {
        $operation = CoordinateOperations::getOperationData($operationSrid);

        $sourceCRS = Geocentric::fromSRID($sourceCrsSrid);
        $targetCRS = CoordinateReferenceSystem::fromSRID($targetCrsSrid);

        $epoch = new DateTime();
        if (isset($operation['method']) && in_array($operation['method'], [CoordinateOperationMethods::EPSG_TIME_SPECIFIC_COORDINATE_FRAME_ROTATION_GEOCEN, CoordinateOperationMethods::EPSG_TIME_SPECIFIC_POSITION_VECTOR_TRANSFORM_GEOCEN], true)) {
            $params = CoordinateOperationParams::getParamData($operationSrid);
            $epoch = (new Year($params['Transformation reference epoch']['value']))->asDateTime();
        }

        $originalPoint = GeocentricPoint::create(new Metre(0), new Metre(0), new Metre(0), $sourceCRS, $epoch);
        $newPoint = $originalPoint->performOperation($operationSrid, $targetCRS, false);
        self::assertInstanceOf(Point::class, $newPoint);
        self::assertEquals($targetCRS, $newPoint->getCRS());

        if ($reversible) {
            $reversedPoint = $newPoint->performOperation($operationSrid, $sourceCRS, true);
            self::assertEquals($sourceCRS, $reversedPoint->getCRS());
            self::assertEqualsWithDelta($originalPoint->getX()->getValue(), $reversedPoint->getX()->getValue(), 0.0001);
            self::assertEqualsWithDelta($originalPoint->getY()->getValue(), $reversedPoint->getY()->getValue(), 0.0001);
            self::assertEqualsWithDelta($originalPoint->getZ()->getValue(), $reversedPoint->getZ()->getValue(), 0.0001);
        }
    }

    public function supportedOperations(): array
    {
        $toTest = [];
        $crss = Geocentric::getSupportedSRIDs();
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

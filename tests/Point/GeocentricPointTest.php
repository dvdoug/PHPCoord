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
use InvalidArgumentException;
use PHPCoord\CoordinateOperation\CoordinateOperationMethods;
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateOperation\CRSTransformationsAfrica;
use PHPCoord\CoordinateOperation\CRSTransformationsAntarctic;
use PHPCoord\CoordinateOperation\CRSTransformationsArctic;
use PHPCoord\CoordinateOperation\CRSTransformationsAsia;
use PHPCoord\CoordinateOperation\CRSTransformationsEurope;
use PHPCoord\CoordinateOperation\CRSTransformationsGlobal;
use PHPCoord\CoordinateOperation\CRSTransformationsNorthAmerica;
use PHPCoord\CoordinateOperation\CRSTransformationsOceania;
use PHPCoord\CoordinateOperation\CRSTransformationsSouthAmerica;
use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\CoordinateOperation\GeoTiffNKGRF17velEuropeProvider;
use PHPCoord\CoordinateOperation\IGNFXyzVelocityRGNC15Provider;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\GeocentricSRIDData;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\Exception\InvalidCoordinateException;
use PHPCoord\Geometry\ExtentInteriorPoints;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Length\Foot;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Length\Millimetre;
use PHPCoord\UnitOfMeasure\Rate;
use PHPCoord\UnitOfMeasure\Scale\PartsPerBillion;
use PHPCoord\UnitOfMeasure\Scale\PartsPerMillion;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use PHPCoord\UnitOfMeasure\Time\Year;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

use function class_exists;
use function in_array;
use function str_ends_with;

require_once __DIR__ . '/../Geometry/ExtentInteriorPoints.php';

class GeocentricPointTest extends TestCase
{
    use GeocentricSRIDData;

    public function test(): void
    {
        $object = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_WGS_84), new Metre(123), new Metre(456), new Metre(789));
        self::assertEquals(123, $object->getX()->getValue());
        self::assertEquals(456, $object->getY()->getValue());
        self::assertEquals(789, $object->getZ()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::4978', $object->getCRS()->getSrid());
        self::assertNull($object->getCoordinateEpoch());
        self::assertEquals('(123, 456, 789)', $object->__toString());
    }

    public function testWithEpochDateTime(): void
    {
        $object = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_WGS_84), new Metre(123), new Metre(456), new Metre(789), new DateTime('2003-02-01'));
        self::assertEquals(123, $object->getX()->getValue());
        self::assertEquals(456, $object->getY()->getValue());
        self::assertEquals(789, $object->getZ()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::4978', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123, 456, 789)', $object->__toString());
    }

    public function testWithEpochDateTimeImmutable(): void
    {
        $object = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_WGS_84), new Metre(123), new Metre(456), new Metre(789), new DateTimeImmutable('2003-02-01'));
        self::assertEquals(123, $object->getX()->getValue());
        self::assertEquals(456, $object->getY()->getValue());
        self::assertEquals(789, $object->getZ()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::4978', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123, 456, 789)', $object->__toString());
    }

    public function testWithFeetAsUnits(): void
    {
        $object = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_WGS_84), new Foot(123), new Foot(123), new Foot(123));
        self::assertEquals(37.4904, $object->getX()->getValue());
        self::assertEquals(37.4904, $object->getY()->getValue());
        self::assertEquals(37.4904, $object->getZ()->getValue());
    }

    #[Group('distance')]
    public function testDistanceCalculation(): void
    {
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_WGS_84), new Metre(6121151.5493), new Metre(-1563978.9235), new Metre(-872615.3556));
        $to = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_WGS_84), new Metre(3797282.484), new Metre(-423484.681), new Metre(5090128.466));
        self::assertEqualsWithDelta(6824225.464, $from->calculateDistance($to)->getValue(), 0.001);
    }

    #[Group('distance')]
    public function testDistanceDifferentCRSsNoAutoconversion(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_CHINA_GEODETIC_COORDINATE_SYSTEM_2000), new Metre(12300), new Metre(45600), new Metre(78900));
        $to = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_PZ_90), new Metre(24600), new Metre(80200), new Metre(16800));
        $from->calculateDistance($to);
    }

    public function testGeographicGeocentric2D(): void
    {
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_WGS_84), new Metre(3771793.968), new Metre(140253.342), new Metre(5124304.349));
        $to = $from->geographicGeocentric(Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));

        self::assertEqualsWithDelta(53.80939444, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(2.12955000, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function testGeographicGeocentric3D(): void
    {
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_WGS_84), new Metre(3771793.968), new Metre(140253.342), new Metre(5124304.349));
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

        $from = GeocentricPoint::create($crs, new Metre(3790644.900), new Metre(-110149.210), new Metre(5111482.970));
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

        $from = GeocentricPoint::create($crs, new Metre(3909833.018), new Metre(-147097.138), new Metre(5020322.478));
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

        $from = GeocentricPoint::create($crs, new Metre(3790644.900), new Metre(-110149.210), new Metre(5111482.970));
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

        $from = GeocentricPoint::create($crs, new Metre(3909833.018), new Metre(-147097.138), new Metre(5020322.478));
        $new = $from->coordinateFrameRotation($crs, $tx, $ty, $tz, $rx, $ry, $rz, $s);

        self::assertEqualsWithDelta(3909460.068, $new->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(-146987.302, $new->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(5019888.070, $new->getZ()->getValue(), 0.001);
    }

    public function testCoordinateFrameRotation(): void
    {
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_WGS_72), new Metre(3657660.66), new Metre(255768.55), new Metre(5201382.11));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->coordinateFrameRotation($toCRS, new Metre(0), new Metre(0), new Metre(4.5), new ArcSecond(0), new ArcSecond(0), new ArcSecond(-0.554), new PartsPerMillion(0.219));

        self::assertEqualsWithDelta(3657660.78, $to->getX()->getValue(), 0.01);
        self::assertEqualsWithDelta(255778.43, $to->getY()->getValue(), 0.01);
        self::assertEqualsWithDelta(5201387.75, $to->getZ()->getValue(), 0.01);
    }

    public function testCoordinateFrameRotationFullMatrixSaba(): void
    {
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_SABA), new Metre(2738467.761), new Metre(-5429579.811), new Metre(1919164.067));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_BES2020_SABA);
        $to = $from->coordinateFrameRotation(
            $toCRS,
            new Metre(1138.7432),
            new Metre(-2064.4761),
            new Metre(110.7016),
            new ArcSecond(-214.615206),
            new ArcSecond(479.360036),
            new ArcSecond(-164.703951),
            new PartsPerMillion(-402.32073)
        );

        self::assertEqualsWithDelta(2738386.686, $to->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(-5429268.990, $to->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(1919210.970, $to->getZ()->getValue(), 0.001);

        $back = $to->coordinateFrameRotation(
            Geocentric::fromSRID(Geocentric::EPSG_SABA),
            new Metre(1138.7432),
            new Metre(-2064.4761),
            new Metre(110.7016),
            new ArcSecond(-214.615206),
            new ArcSecond(479.360036),
            new ArcSecond(-164.703951),
            new PartsPerMillion(-402.32073),
            true
        );

        self::assertEqualsWithDelta(2738467.761, $back->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(-5429579.811, $back->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(1919164.067, $back->getZ()->getValue(), 0.001);
    }

    public function testPositionVectorTransformation(): void
    {
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_WGS_72), new Metre(3657660.66), new Metre(255768.55), new Metre(5201382.11));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->positionVectorTransformation($toCRS, new Metre(0), new Metre(0), new Metre(4.5), new ArcSecond(0), new ArcSecond(0), new ArcSecond(0.554), new PartsPerMillion(0.219));

        self::assertEqualsWithDelta(3657660.78, $to->getX()->getValue(), 0.01);
        self::assertEqualsWithDelta(255778.43, $to->getY()->getValue(), 0.01);
        self::assertEqualsWithDelta(5201387.75, $to->getZ()->getValue(), 0.01);
    }

    public function testCoordinateFrameMolodenskyBadekas(): void
    {
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_LGD2006), new Metre(2550408.96), new Metre(-5749912.26), new Metre(1054891.11));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->coordinateFrameMolodenskyBadekas($toCRS, new Metre(-270.933), new Metre(115.599), new Metre(-360.226), new ArcSecond(-5.266), new ArcSecond(-1.238), new ArcSecond(2.381), new PartsPerMillion(-5.109), new Metre(2464351.59), new Metre(-5783466.61), new Metre(974809.81));

        self::assertEqualsWithDelta(2550138.467, $to->getX()->getValue(), 0.1);
        self::assertEqualsWithDelta(-5749799.862, $to->getY()->getValue(), 0.1);
        self::assertEqualsWithDelta(1054530.826, $to->getZ()->getValue(), 0.1);
    }

    public function testPositionVectorMolodenskyBadekas(): void
    {
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_LGD2006), new Metre(2550408.96), new Metre(-5749912.26), new Metre(1054891.11));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->positionVectorMolodenskyBadekas($toCRS, new Metre(-270.933), new Metre(115.599), new Metre(-360.226), new ArcSecond(5.266), new ArcSecond(1.238), new ArcSecond(-2.381), new PartsPerMillion(-5.109), new Metre(2464351.59), new Metre(-5783466.61), new Metre(974809.81));

        self::assertEqualsWithDelta(2550138.467, $to->getX()->getValue(), 0.1);
        self::assertEqualsWithDelta(-5749799.862, $to->getY()->getValue(), 0.1);
        self::assertEqualsWithDelta(1054530.826, $to->getZ()->getValue(), 0.1);
    }

    public function testGeocentricTranslation(): void
    {
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_WGS_84), new Metre(3771793.97), new Metre(140253.34), new Metre(5124304.35));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_WGS_84);
        $to = $from->geocentricTranslation($toCRS, new Metre(84.87), new Metre(96.49), new Metre(116.95));

        self::assertEqualsWithDelta(3771878.84, $to->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(140349.83, $to->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(5124421.30, $to->getZ()->getValue(), 0.001);
    }

    public function testTimeSpecificCoordinateFrameRotationEpochMatching(): void
    {
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11), new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656), new DateTime('2010-01-01'));
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
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11), new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656), new DateTime('2010-01-03'));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->timeSpecificCoordinateFrameRotation($toCRS, new Metre(0.003), new Metre(0.001), new Metre(0), new ArcSecond(-0.000019), new ArcSecond(0.000042), new ArcSecond(-0.000002), new Unity(0), new Year(2010.0));
    }

    public function testTimeSpecificCoordinateFrameRotationEpochMissing(): void
    {
        $this->expectException(InvalidCoordinateException::class);
        $this->expectExceptionMessage('This transformation is only valid for epoch 2010, none given');
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11), new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->timeSpecificCoordinateFrameRotation($toCRS, new Metre(0.003), new Metre(0.001), new Metre(0), new ArcSecond(-0.000019), new ArcSecond(0.000042), new ArcSecond(-0.000002), new Unity(0), new Year(2010.0));
    }

    public function testTimeSpecificPositionVectorTransformationEpochMatching(): void
    {
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11), new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656), new DateTime('2010-01-01'));
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
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11), new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656), new DateTime('2010-01-03'));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->timeSpecificPositionVectorTransformation($toCRS, new Metre(0.003), new Metre(0.001), new Metre(0), new ArcSecond(0.000019), new ArcSecond(-0.000042), new ArcSecond(0.000002), new Unity(0), new Year(2010.0));
    }

    public function testTimeSpecificPositionVectorTransformationEpochMissing(): void
    {
        $this->expectException(InvalidCoordinateException::class);
        $this->expectExceptionMessage('This transformation is only valid for epoch 2010, none given');
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11), new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->timeSpecificPositionVectorTransformation($toCRS, new Metre(0.003), new Metre(0.001), new Metre(0), new ArcSecond(0.000019), new ArcSecond(-0.000042), new ArcSecond(0.000002), new Unity(0), new Year(2010.0));
    }

    public function testTimeDependentCoordinateFrameRotationWithEpoch(): void
    {
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_ITRF2008), new Metre(-3789470.710), new Metre(4841770.404), new Metre(-1690893.952), (new Year(2013.90))->asDateTime());
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_GDA94);
        $to = $from->timeDependentCoordinateFrameRotation($toCRS, new Metre(-84.68 / 1000), new Metre(-19.42 / 1000), new Metre(32.01 / 1000), new ArcSecond(-0.4254 / 1000), new ArcSecond(2.2578 / 1000), new ArcSecond(2.4015 / 1000), new PartsPerMillion(0.00971), new Rate(new Metre(1.42 / 1000), new Year(1)), new Rate(new Metre(1.34 / 1000), new Year(1)), new Rate(new Metre(0.90 / 1000), new Year(1)), new Rate(new ArcSecond(1.5461 / 1000), new Year(1)), new Rate(new ArcSecond(1.1820 / 1000), new Year(1)), new Rate(new ArcSecond(1.1551 / 1000), new Year(1)), new Rate(new PartsPerMillion(0.000109), new Year(1)), new Year(1994.0));

        self::assertEqualsWithDelta(-3789470.004, $to->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(4841770.686, $to->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(-1690895.108, $to->getZ()->getValue(), 0.001);
    }

    public function testTimeDependentPositionVectorTransformationWithEpoch(): void
    {
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_ITRF2008), new Metre(-3789470.710), new Metre(4841770.404), new Metre(-1690893.952), (new Year(2013.90))->asDateTime());
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_GDA94);
        $to = $from->timeDependentPositionVectorTransformation($toCRS, new Metre(-84.68 / 1000), new Metre(-19.42 / 1000), new Metre(32.01 / 1000), new ArcSecond(0.4254 / 1000), new ArcSecond(-2.2578 / 1000), new ArcSecond(-2.4015 / 1000), new PartsPerMillion(0.00971), new Rate(new Metre(1.42 / 1000), new Year(1)), new Rate(new Metre(1.34 / 1000), new Year(1)), new Rate(new Metre(0.90 / 1000), new Year(1)), new Rate(new ArcSecond(-1.5461 / 1000), new Year(1)), new Rate(new ArcSecond(-1.1820 / 1000), new Year(1)), new Rate(new ArcSecond(-1.1551 / 1000), new Year(1)), new Rate(new PartsPerMillion(0.000109), new Year(1)), new Year(1994.0));

        self::assertEqualsWithDelta(-3789470.004, $to->getX()->getValue(), 0.001);
        self::assertEqualsWithDelta(4841770.686, $to->getY()->getValue(), 0.001);
        self::assertEqualsWithDelta(-1690895.108, $to->getZ()->getValue(), 0.001);
    }

    public function testPointMotionGeocentricXyzVelocities(): void
    {
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_ITRF2008), new Metre(2845456.0813), new Metre(2160954.2453), new Metre(5265993.2296), (new Year(2005.0))->asDateTime());
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->pointMotionXyzVelocities($toCRS, new Rate(new Metre(-0.0212), new Year(1)), new Rate(new Metre(0.0124), new Year(1)), new Rate(new Metre(0.0072), new Year(1)), new Year(2010.0));

        self::assertEqualsWithDelta(2845455.9753, $to->getX()->getValue(), 0.0001);
        self::assertEqualsWithDelta(2160954.3073, $to->getY()->getValue(), 0.0001);
        self::assertEqualsWithDelta(5265993.2656, $to->getZ()->getValue(), 0.0001);
        self::assertEquals(2010.0, Year::fromDateTime($to->getCoordinateEpoch())->getValue());
    }

    public function testPointMotionGeocentricXyzVelocitiesEpochMissing(): void
    {
        $this->expectException(InvalidCoordinateException::class);
        $from = GeocentricPoint::create(Geocentric::fromSRID(Geocentric::EPSG_ITRF2008), new Metre(2845456.0813), new Metre(2160954.2453), new Metre(5265993.2296));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $from->pointMotionXyzVelocities($toCRS, new Rate(new Metre(-0.0212), new Year(1)), new Rate(new Metre(0.0124), new Year(1)), new Rate(new Metre(0.0072), new Year(1)), new Year(2010.0));
    }

    public function testPointMotionXyzVelocityGrid(): void
    {
        if (!class_exists(IGNFXyzVelocityRGNC15Provider::class)) {
            self::markTestSkipped('Oceania datapack not installed');
        }

        $crs = Geocentric::fromSRID(Geocentric::EPSG_RGNC15);
        // Grid node at 166.45°E, 22.25°S: −0.0225, −0.0170, +0.0435 m/yr.
        $geographic = new GeographicValue(new Degree(-22.25), new Degree(166.45), new Metre(0), $crs->getDatum());
        $xyz = $geographic->asGeocentricValue();
        $from = GeocentricPoint::create($crs, $xyz->getX(), $xyz->getY(), $xyz->getZ(), (new Year(2015.0))->asDateTime());
        $grid = (new IGNFXyzVelocityRGNC15Provider())->provideGrid();
        $to = $from->pointMotionXyzVelocityGrid($crs, $grid, new Year(2025.0));

        self::assertEqualsWithDelta($from->getX()->asMetres()->getValue() - 0.225, $to->getX()->asMetres()->getValue(), 1e-9);
        self::assertEqualsWithDelta($from->getY()->asMetres()->getValue() - 0.170, $to->getY()->asMetres()->getValue(), 1e-9);
        self::assertEqualsWithDelta($from->getZ()->asMetres()->getValue() + 0.435, $to->getZ()->asMetres()->getValue(), 1e-9);
        self::assertEquals(2025.0, Year::fromDateTime($to->getCoordinateEpoch())->getValue());

        $back = $to->pointMotionXyzVelocityGrid($crs, $grid, new Year(2015.0), true);
        self::assertEqualsWithDelta($from->getX()->asMetres()->getValue(), $back->getX()->asMetres()->getValue(), 1e-6);
        self::assertEqualsWithDelta($from->getY()->asMetres()->getValue(), $back->getY()->asMetres()->getValue(), 1e-6);
        self::assertEqualsWithDelta($from->getZ()->asMetres()->getValue(), $back->getZ()->asMetres()->getValue(), 1e-6);
        self::assertEquals(2015.0, Year::fromDateTime($back->getCoordinateEpoch())->getValue());
    }

    public function testPointMotionXyzVelocityGridEpochMissing(): void
    {
        if (!class_exists(IGNFXyzVelocityRGNC15Provider::class)) {
            self::markTestSkipped('Oceania datapack not installed');
        }

        $this->expectException(InvalidCoordinateException::class);
        $crs = Geocentric::fromSRID(Geocentric::EPSG_RGNC15);
        $from = GeocentricPoint::create($crs, new Metre(0), new Metre(0), new Metre(0));
        $from->pointMotionXyzVelocityGrid($crs, (new IGNFXyzVelocityRGNC15Provider())->provideGrid(), new Year(2025.0));
    }

    public function testAtEpochRgnc15VelocityGrid(): void
    {
        if (!class_exists(IGNFXyzVelocityRGNC15Provider::class)) {
            self::markTestSkipped('Oceania datapack not installed');
        }

        $crs = Geocentric::fromSRID(Geocentric::EPSG_RGNC15);
        $geographic = new GeographicValue(new Degree(-22.25), new Degree(166.45), new Metre(0), $crs->getDatum());
        $xyz = $geographic->asGeocentricValue();
        $from = GeocentricPoint::create($crs, $xyz->getX(), $xyz->getY(), $xyz->getZ(), (new Year(2015.0))->asDateTime());
        $to = $from->atEpoch((new Year(2025.0))->asDateTime());

        self::assertEquals($crs->getSRID(), $to->getCRS()->getSRID());
        self::assertEqualsWithDelta($from->getX()->asMetres()->getValue() - 0.225, $to->getX()->asMetres()->getValue(), 1e-6);
        self::assertEqualsWithDelta($from->getY()->asMetres()->getValue() - 0.170, $to->getY()->asMetres()->getValue(), 1e-6);
        self::assertEqualsWithDelta($from->getZ()->asMetres()->getValue() + 0.435, $to->getZ()->asMetres()->getValue(), 1e-6);
        self::assertEquals(2025.0, Year::fromDateTime($to->getCoordinateEpoch())->getValue());

        $back = $to->atEpoch((new Year(2015.0))->asDateTime());
        self::assertEqualsWithDelta($from->getX()->asMetres()->getValue(), $back->getX()->asMetres()->getValue(), 1e-4);
        self::assertEqualsWithDelta($from->getY()->asMetres()->getValue(), $back->getY()->asMetres()->getValue(), 1e-4);
        self::assertEqualsWithDelta($from->getZ()->asMetres()->getValue(), $back->getZ()->asMetres()->getValue(), 1e-4);
        self::assertEquals(2015.0, Year::fromDateTime($back->getCoordinateEpoch())->getValue());
    }

    public function testPointMotionGeocentricNeuVelocities(): void
    {
        $crs = Geocentric::fromSRID(Geocentric::EPSG_ITRF2014);
        $from = GeocentricPoint::create($crs, new Metre(2885900.5477), new Metre(827499.5911), new Metre(5608599.7785), (new Year(2020.25))->asDateTime());
        $to = $from->pointMotionNeuVelocities($crs, new Rate(new Millimetre(-0.3879), new Year(1)), new Rate(new Millimetre(-0.7701), new Year(1)), new Rate(new Millimetre(8.8991), new Year(1)), new Year(2000.0));

        self::assertEqualsWithDelta(2885900.4554, $to->getX()->getValue(), 0.0001);
        self::assertEqualsWithDelta(827499.5809, $to->getY()->getValue(), 0.0001);
        self::assertEqualsWithDelta(5608599.6231, $to->getZ()->getValue(), 0.0001);
        self::assertEquals(2000.0, Year::fromDateTime($to->getCoordinateEpoch())->getValue());
    }

    public function testPointMotionGeocentricNeuVelocitiesEpochMissing(): void
    {
        $this->expectException(InvalidCoordinateException::class);
        $crs = Geocentric::fromSRID(Geocentric::EPSG_ITRF2014);
        $from = GeocentricPoint::create($crs, new Metre(2885900.5477), new Metre(827499.5911), new Metre(5608599.7785));
        $from->pointMotionNeuVelocities($crs, new Rate(new Millimetre(-0.3879), new Year(1)), new Rate(new Millimetre(-0.7701), new Year(1)), new Rate(new Millimetre(8.8991), new Year(1)), new Year(2000.0));
    }

    public function testGeocentricTranslationsUsingNeuVelocityGrid(): void
    {
        if (!class_exists(GeoTiffNKGRF17velEuropeProvider::class)) {
            self::markTestSkipped('Europe datapack not installed');
        }

        // GN 7-2 §4.3.6.3 / EPSG 10809 ETRF2014@2020.25 → NKG_ETRF14@2000.0
        $from = GeocentricPoint::create(
            Geocentric::fromSRID(Geocentric::EPSG_ETRF2014),
            new Metre(2885900.000),
            new Metre(827500.000),
            new Metre(5608600.000),
            (new Year(2020.25))->asDateTime()
        );
        $to = $from->geocentricTranslationsUsingNeuVelocityGrid(
            Geocentric::fromSRID(Geocentric::EPSG_NKG_ETRF14),
            (new GeoTiffNKGRF17velEuropeProvider())->provideGrid(),
            new Year(-999),
            new Year(2000.0)
        );

        self::assertEqualsWithDelta(2885899.9077, $to->getX()->asMetres()->getValue(), 0.0001);
        self::assertEqualsWithDelta(827499.9898, $to->getY()->asMetres()->getValue(), 0.0001);
        self::assertEqualsWithDelta(5608599.8446, $to->getZ()->asMetres()->getValue(), 0.0001);
        self::assertEquals(2000.0, Year::fromDateTime($to->getCoordinateEpoch())->getValue());
    }

    public function testPositionVectorUsingNeuVelocityGrid(): void
    {
        if (!class_exists(GeoTiffNKGRF17velEuropeProvider::class)) {
            self::markTestSkipped('Europe datapack not installed');
        }

        // GN 7-2 §5.2.1 NKG_ETRF14 to SWEREF99
        $grid = (new GeoTiffNKGRF17velEuropeProvider())->provideGrid();
        $from = GeocentricPoint::create(
            Geocentric::fromSRID(Geocentric::EPSG_NKG_ETRF14),
            new Metre(2885900.000),
            new Metre(827500.000),
            new Metre(5608600.000),
            (new Year(2000.0))->asDateTime()
        );
        $to = $from->positionVectorTransformationUsingNeuVelocityGrid(
            Geocentric::fromSRID(Geocentric::EPSG_ETRS89_SWE_SWEREF_99),
            new Metre(0.03054),
            new Metre(0.04606),
            new Metre(-0.07944),
            new ArcSecond(1.41958 / 1000),
            new ArcSecond(0.15132 / 1000),
            new ArcSecond(1.50337 / 1000),
            new PartsPerBillion(3.002),
            $grid,
            new Year(2000.0),
            new Year(1999.5)
        );

        // The note rounds the Helmert step, then the velocities, each to 0.0001 m.
        self::assertEqualsWithDelta(2885900.0349, $to->getX()->asMetres()->getValue(), 0.0002);
        self::assertEqualsWithDelta(827500.0306, $to->getY()->asMetres()->getValue(), 0.0002);
        self::assertEqualsWithDelta(5608599.9371, $to->getZ()->asMetres()->getValue(), 0.0002);
        self::assertEquals(1999.5, Year::fromDateTime($to->getCoordinateEpoch())->getValue());

        $back = $to->positionVectorTransformationUsingNeuVelocityGrid(
            Geocentric::fromSRID(Geocentric::EPSG_NKG_ETRF14),
            new Metre(0.03054),
            new Metre(0.04606),
            new Metre(-0.07944),
            new ArcSecond(1.41958 / 1000),
            new ArcSecond(0.15132 / 1000),
            new ArcSecond(1.50337 / 1000),
            new PartsPerBillion(3.002),
            $grid,
            new Year(2000.0),
            new Year(1999.5),
            true
        );

        self::assertEqualsWithDelta(2885900.000, $back->getX()->asMetres()->getValue(), 0.0001);
        self::assertEqualsWithDelta(827500.000, $back->getY()->asMetres()->getValue(), 0.0001);
        self::assertEqualsWithDelta(5608600.000, $back->getZ()->asMetres()->getValue(), 0.0001);
        self::assertEquals(2000.0, Year::fromDateTime($back->getCoordinateEpoch())->getValue());
    }

    public function testGeocentricTranslationsUsingNeuVelocityGridEpochMissing(): void
    {
        if (!class_exists(GeoTiffNKGRF17velEuropeProvider::class)) {
            self::markTestSkipped('Europe datapack not installed');
        }

        $this->expectException(InvalidCoordinateException::class);
        $crs = Geocentric::fromSRID(Geocentric::EPSG_ETRF2014);
        $from = GeocentricPoint::create($crs, new Metre(3086390.994), new Metre(1002829.224), new Metre(5472414.994));
        $from->geocentricTranslationsUsingNeuVelocityGrid(
            Geocentric::fromSRID(Geocentric::EPSG_NKG_ETRF14),
            (new GeoTiffNKGRF17velEuropeProvider())->provideGrid(),
            new Year(-999),
            new Year(2000.0)
        );
    }

    #[DataProvider('supportedOperations')]
    #[Group('integration')]
    public function testOperations(string $sourceCrsSrid, string $targetCrsSrid, string $operationSrid): void
    {
        $operation = CoordinateOperations::getOperationData($operationSrid);
        $method = CoordinateOperationMethods::getMethodData($operation['method']);
        $centre = ExtentInteriorPoints::get($operation['extent']);

        $sourceCRS = Geocentric::fromSRID($sourceCrsSrid);
        $centre = (new GeographicValue($centre[0], $centre[1], new Metre(0), $sourceCRS->getDatum()))->asGeocentricValue();
        $targetCRS = CoordinateReferenceSystem::fromSRID($targetCrsSrid);

        $epoch = new DateTime();
        if (isset($operation['method']) && in_array($operation['method'], [CoordinateOperationMethods::EPSG_TIME_SPECIFIC_COORDINATE_FRAME_ROTATION_GEOCEN, CoordinateOperationMethods::EPSG_TIME_SPECIFIC_POSITION_VECTOR_TRANSFORM_GEOCEN], true)) {
            $params = CoordinateOperations::getParamData($operationSrid);
            $epoch = $params['transformationReferenceEpoch']->asDateTime();
        }
        if ($operation['method'] === CoordinateOperationMethods::EPSG_GEOCENTRIC_TRANSLATIONS_USING_NEU_VELOCITY_GRID_GTG) {
            $params = CoordinateOperations::getParamData($operationSrid);
            $epoch = $params['targetEpoch']->asDateTime();
        }
        $additionalParams = [];
        if ($operation['method'] === CoordinateOperationMethods::EPSG_POINT_MOTION_GEOCEN_DOMAIN_USING_XYZ_VELOCITY_GRID_BGN) {
            $additionalParams['targetEpoch'] = Year::fromDateTime($epoch);
        }

        $originalPoint = GeocentricPoint::create($sourceCRS, $centre->getX(), $centre->getY(), $centre->getZ(), $epoch);
        $newPoint = $originalPoint->performOperation($operationSrid, $targetCRS, false, new Metre(0), $additionalParams);
        self::assertInstanceOf(Point::class, $newPoint);
        self::assertEquals($targetCRS, $newPoint->getCRS());

        if ($method['reversible']) {
            $reversedPoint = $newPoint->performOperation($operationSrid, $sourceCRS, true, new Metre(0), $additionalParams);
            self::assertEquals($sourceCRS, $reversedPoint->getCRS());
            self::assertEqualsWithDelta($originalPoint->getX()->getValue(), $reversedPoint->getX()->getValue(), 0.0001);
            self::assertEqualsWithDelta($originalPoint->getY()->getValue(), $reversedPoint->getY()->getValue(), 0.0001);
            self::assertEqualsWithDelta($originalPoint->getZ()->getValue(), $reversedPoint->getZ()->getValue(), 0.0001);
        }
    }

    public static function supportedOperations(): array
    {
        $toTest = [];
        foreach ([...CRSTransformationsGlobal::getSupportedTransformations(), ...CRSTransformationsAfrica::getSupportedTransformations(), ...CRSTransformationsAntarctic::getSupportedTransformations(), ...CRSTransformationsArctic::getSupportedTransformations(), ...CRSTransformationsAsia::getSupportedTransformations(), ...CRSTransformationsEurope::getSupportedTransformations(), ...CRSTransformationsNorthAmerica::getSupportedTransformations(), ...CRSTransformationsOceania::getSupportedTransformations(), ...CRSTransformationsSouthAmerica::getSupportedTransformations()] as $transformation) {
            if (isset(static::$sridData[$transformation['source_crs']])) {
                // filter out operations that require a grid file that we don't have
                $needsNonExistentFile = false;
                foreach (CoordinateOperations::getParamData($transformation['operation']) as $paramName => $paramValue) {
                    if (str_ends_with($paramName, 'File') && $paramValue && !class_exists($paramValue)) {
                        $needsNonExistentFile = true;
                    }
                }

                if (!$needsNonExistentFile) {
                    $toTest[$transformation['operation'] . ' ' . $transformation['name'] . ': ' . $transformation['source_crs'] . '->' . $transformation['target_crs']] = [
                        $transformation['source_crs'],
                        $transformation['target_crs'],
                        $transformation['operation'],
                    ];
                }
            }
        }

        return $toTest;
    }
}

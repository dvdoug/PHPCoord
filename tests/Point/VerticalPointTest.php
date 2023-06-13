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
use PHPCoord\CoordinateOperation\GTXDunedin1958NZVD2016Provider;
use PHPCoord\CoordinateOperation\GTXNGVD29NAVD88CONUSCentralProvider;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\CoordinateReferenceSystem\VerticalSRIDData;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Geometry\BoundingArea;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Foot;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\TestCase;

use function class_exists;
use function str_ends_with;

class VerticalPointTest extends TestCase
{
    use VerticalSRIDData;

    public function testVertical(): void
    {
        $object = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT), new Metre(123));
        self::assertEquals(123, $object->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::3855', $object->getCRS()->getSrid());
        self::assertNull($object->getCoordinateEpoch());
        self::assertEquals('(123)', $object->__toString());
    }

    public function testVerticalWithEpochDateTime(): void
    {
        $object = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT), new Metre(123), new DateTime('2003-02-01'));
        self::assertEquals(123, $object->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::3855', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123)', $object->__toString());
    }

    public function testVerticalWithEpochDateTimeImmutable(): void
    {
        $object = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT), new Metre(123), new DateTimeImmutable('2003-02-01'));
        self::assertEquals(123, $object->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::3855', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123)', $object->__toString());
    }

    public function testVerticalWithFeetAsUnits(): void
    {
        $object = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT), new Foot(123));
        self::assertEquals(37.4904, $object->getHeight()->getValue());
    }

    /**
     * @group distance
     */
    public function testDistanceCalculation(): void
    {
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT), new Metre(100));
        $to = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT), new Metre(80));
        self::assertEqualsWithDelta(20, $from->calculateDistance($to)->getValue(), 0.000001);
    }

    /**
     * @group distance
     */
    public function testDistanceCalculationDifferentCRS(): void
    {
        $this->expectException(InvalidCoordinateReferenceSystemException::class);
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT), new Metre(100));
        $to = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_NAVD88_HEIGHT), new Metre(80));
        $from->calculateDistance($to);
    }

    public function testVerticalOffset(): void
    {
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_BALTIC_1977_HEIGHT), new Metre(2.55));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_BLACK_SEA_HEIGHT);
        $to = $from->offset($toCRS, new Metre(0.4));

        self::assertEqualsWithDelta(2.95, $to->getHeight()->getValue(), 0.001);
    }

    public function testVerticalOffsetAndSlope(): void
    {
        $horizontalPoint = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89), new Radian(0.826122513), new Radian(0.168715161), null);
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_LN02_HEIGHT), new Metre(473));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_EVRF2000_HEIGHT);
        $to = $from->offsetAndSlope($toCRS, new Radian(0.818850307), new Radian(0.142826110), new Metre(-0.245), new Radian(-0.000001018), new Radian(-0.000000155), 'urn:ogc:def:crs:EPSG::4258', $horizontalPoint);

        self::assertEqualsWithDelta(472.69, $to->getHeight()->asMetres()->getValue(), 0.001);
    }

    public function testHeightDepthReversal(): void
    {
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_BALTIC_1977_HEIGHT), new Metre(2.55));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_BALTIC_1977_HEIGHT);
        $to = $from->heightDepthReversal($toCRS);

        self::assertEqualsWithDelta(-2.55, $to->getHeight()->getValue(), 0.001);
    }

    public function testChangeOfVerticalUnit(): void
    {
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_POOLBEG_HEIGHT_FT_BR36), new Foot(1));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_POOLBEG_HEIGHT_M);
        $to = $from->changeOfVerticalUnit($toCRS);

        self::assertEqualsWithDelta(0.3048, $to->getHeight()->getValue(), 0.001);
    }

    public function testZeroTideHeightToMeanTideHeightEVRF2019Forward(): void
    {
        $horizontalPoint = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89), new Radian(0.88867075), new Radian(0.168715161), null);
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_EVRF2019_HEIGHT), new Metre(100.154));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_EVRF2019_MEAN_TIDE_HEIGHT);
        $to = $from->zeroTideHeightToMeanTideHeightEVRF2019($toCRS, false, $horizontalPoint);

        self::assertEqualsWithDelta(100.147, $to->getHeight()->asMetres()->getValue(), 0.001);
    }

    public function testZeroTideHeightToMeanTideHeightEVRF2019Reverse(): void
    {
        $horizontalPoint = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89), new Radian(0.88867075), new Radian(0.168715161), null);
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_EVRF2019_MEAN_TIDE_HEIGHT), new Metre(100.147));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_EVRF2019_HEIGHT);
        $to = $from->zeroTideHeightToMeanTideHeightEVRF2019($toCRS, true, $horizontalPoint);

        self::assertEqualsWithDelta(100.154, $to->getHeight()->asMetres()->getValue(), 0.001);
    }

    public function testVerticalOffsetGTXForward(): void
    {
        if (!class_exists(GTXDunedin1958NZVD2016Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-oceania');
        }
        $horizontalPoint = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_NZGD2000), new Degree(-44.42), new Degree(168.92), null);
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_NZVD2016_HEIGHT), new Metre(50));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_DUNEDIN_1958_HEIGHT);
        $to = $from->offsetFromGrid($toCRS, (new GTXDunedin1958NZVD2016Provider())->provideGrid(), false, $horizontalPoint);

        self::assertEqualsWithDelta(50.304, $to->getHeight()->getValue(), 0.001);
    }

    public function testVerticalOffsetGTXReverse(): void
    {
        if (!class_exists(GTXDunedin1958NZVD2016Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-oceania');
        }
        $horizontalPoint = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_NZGD2000), new Degree(-44.42), new Degree(168.92), null);
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_DUNEDIN_1958_HEIGHT), new Metre(50.304));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_NZVD2016_HEIGHT);
        $to = $from->offsetFromGrid($toCRS, (new GTXDunedin1958NZVD2016Provider())->provideGrid(), true, $horizontalPoint);

        self::assertEqualsWithDelta(50.000, $to->getHeight()->getValue(), 0.001);
    }

    public function testVerticalOffsetGTXUSVERTCON(): void
    {
        if (!class_exists(GTXNGVD29NAVD88CONUSCentralProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-northamerica');
        }
        $horizontalPoint = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_NAD83), new Degree(29.4667897), new Degree(-98.4803739), null);
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_NGVD29_HEIGHT_M), new Metre(247.47));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_NAVD88_HEIGHT);
        $to = $from->offsetFromGrid($toCRS, (new GTXNGVD29NAVD88CONUSCentralProvider())->provideGrid(), false, $horizontalPoint);

        self::assertEqualsWithDelta(247.599, $to->getHeight()->getValue(), 0.001);
    }

    /**
     * @group integration
     * @dataProvider supportedOperations
     */
    public function testOperations(string $sourceCrsSrid, string $targetCrsSrid, string $operationSrid): void
    {
        $sourceCRS = Vertical::fromSRID($sourceCrsSrid);
        $targetCRS = Vertical::fromSRID($targetCrsSrid);

        $operation = CoordinateOperations::getOperationData($operationSrid);
        $method = CoordinateOperationMethods::getMethodData($operation['method']);
        $operationExtent = BoundingArea::createFromExtentCodes(CoordinateOperations::getOperationData($operationSrid)['extent']);

        $epoch = new DateTime();

        $originalPoint = VerticalPoint::create($sourceCRS, new Metre(0), $epoch);
        $horizontalCentre = $operationExtent->getPointInside();
        $horizontalPoint = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84), $horizontalCentre[0], $horizontalCentre[1], null);

        $newPoint = $originalPoint->performOperation($operationSrid, $targetCRS, false, ['horizontalPoint' => $horizontalPoint]);
        self::assertInstanceOf(Point::class, $newPoint);
        self::assertEquals($targetCRS, $newPoint->getCRS());

        if ($method['reversible']) {
            $reversedPoint = $newPoint->performOperation($operationSrid, $sourceCRS, true, ['horizontalPoint' => $horizontalPoint]);

            self::assertEquals($sourceCRS, $reversedPoint->getCRS());
            self::assertEqualsWithDelta($originalPoint->getHeight()->getValue(), $reversedPoint->getHeight()->getValue(), 0.0001);
        }
    }

    public static function supportedOperations(): array
    {
        $toTest = [];
        foreach ([...CRSTransformationsGlobal::getSupportedTransformations(), ...CRSTransformationsAfrica::getSupportedTransformations(), ...CRSTransformationsAntarctic::getSupportedTransformations(), ...CRSTransformationsArctic::getSupportedTransformations(), ...CRSTransformationsAsia::getSupportedTransformations(), ...CRSTransformationsEurope::getSupportedTransformations(), ...CRSTransformationsNorthAmerica::getSupportedTransformations(), ...CRSTransformationsOceania::getSupportedTransformations(), ...CRSTransformationsSouthAmerica::getSupportedTransformations()] as $transformation) {
            $needsNonExistentFile = false;

            if (isset(static::$sridData[$transformation['source_crs']])) {
                // filter out operations that require a grid file that we don't have
                foreach (CoordinateOperations::getParamData($transformation['operation']) as $paramName => $paramValue) {
                    if (str_ends_with($paramName, 'File') && $paramValue !== null && !class_exists($paramValue)) {
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

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
use PHPCoord\CoordinateOperation\GURSHeightSVS2000SVS2010SloveniaProvider;
use PHPCoord\CoordinateOperation\PatchJGDHeightJGD2011JGD2024JapanProvider;
use PHPCoord\CoordinateOperation\GTXDunedin1958NZVD2016Provider;
use PHPCoord\CoordinateOperation\GTXNGVD29NAVD88CONUSCentralProvider;
use PHPCoord\CoordinateOperation\NTv2VelNAD83CSRSv7CanadaProvider;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\CoordinateReferenceSystem\VerticalSRIDData;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Geometry\ExtentInteriorPoints;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Foot;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Time\Year;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
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

    #[Group('distance')]
    public function testDistanceCalculation(): void
    {
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT), new Metre(100));
        $to = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT), new Metre(80));
        self::assertEqualsWithDelta(20, $from->calculateDistance($to)->getValue(), 0.000001);
    }

    #[Group('distance')]
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

    public function testVerticalOffsetGURSForward(): void
    {
        if (!class_exists(GURSHeightSVS2000SVS2010SloveniaProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        // Node at 13°E, 47°N stores -0.1285 m (SVS2010 - SVS2000).
        $horizontalPoint = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89_SVN_D96), new Degree(47.0), new Degree(13.0), null);
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_SVS2000_HEIGHT), new Metre(100));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_SVS2010_HEIGHT);
        $to = $from->offsetFromGrid($toCRS, (new GURSHeightSVS2000SVS2010SloveniaProvider())->provideGrid(), false, $horizontalPoint);

        self::assertEqualsWithDelta(99.8715, $to->getHeight()->getValue(), 0.0000001);
    }

    public function testVerticalOffsetGURSReverse(): void
    {
        if (!class_exists(GURSHeightSVS2000SVS2010SloveniaProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $horizontalPoint = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89_SVN_D96), new Degree(47.0), new Degree(13.0), null);
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_SVS2010_HEIGHT), new Metre(99.8715));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_SVS2000_HEIGHT);
        $to = $from->offsetFromGrid($toCRS, (new GURSHeightSVS2000SVS2010SloveniaProvider())->provideGrid(), true, $horizontalPoint);

        self::assertEqualsWithDelta(100.0, $to->getHeight()->getValue(), 0.0000001);
    }

    public function testVerticalOffsetGURSInterpolated(): void
    {
        if (!class_exists(GURSHeightSVS2000SVS2010SloveniaProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        // Interpolated at the centre of the cell whose nodes are -0.1347, -0.1329, -0.1337 and -0.1318 m.
        $horizontalPoint = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89_SVN_D96), new Degree(46.05416666666667), new Degree(14.50625), null);
        $grid = (new GURSHeightSVS2000SVS2010SloveniaProvider())->provideGrid();
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_SVS2000_HEIGHT), new Metre(50));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_SVS2010_HEIGHT);
        $to = $from->offsetFromGrid($toCRS, $grid, false, $horizontalPoint);

        self::assertEqualsWithDelta(49.866725, $to->getHeight()->getValue(), 0.0000001);

        $back = $to->offsetFromGrid(Vertical::fromSRID(Vertical::EPSG_SVS2000_HEIGHT), $grid, true, $horizontalPoint);
        self::assertEqualsWithDelta(50.0, $back->getHeight()->getValue(), 0.0000001);
    }

    public function testVerticalOffsetPatchJGDForward(): void
    {
        if (!class_exists(PatchJGDHeightJGD2011JGD2024JapanProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-asia');
        }
        // Node 36224780 stores -0.00265 m at 24.4°N, 122.875°E.
        $horizontalPoint = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_JGD2024), new Degree(24.4), new Degree(122.875), null);
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_JGD2011_VERTICAL_HEIGHT), new Metre(100));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_JGD2024_VERTICAL_HEIGHT);
        $to = $from->offsetFromGrid($toCRS, (new PatchJGDHeightJGD2011JGD2024JapanProvider())->provideGrid(), false, $horizontalPoint);

        self::assertEqualsWithDelta(99.99735, $to->getHeight()->getValue(), 0.0000001);
    }

    public function testVerticalOffsetPatchJGDReverse(): void
    {
        if (!class_exists(PatchJGDHeightJGD2011JGD2024JapanProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-asia');
        }
        $horizontalPoint = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_JGD2024), new Degree(24.4), new Degree(122.875), null);
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_JGD2024_VERTICAL_HEIGHT), new Metre(99.99735));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_JGD2011_VERTICAL_HEIGHT);
        $to = $from->offsetFromGrid($toCRS, (new PatchJGDHeightJGD2011JGD2024JapanProvider())->provideGrid(), true, $horizontalPoint);

        self::assertEqualsWithDelta(100.0, $to->getHeight()->getValue(), 0.0000001);
    }

    public function testVerticalOffsetPatchJGDInterpolated(): void
    {
        if (!class_exists(PatchJGDHeightJGD2011JGD2024JapanProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-asia');
        }
        // Centre of the cell whose nodes are -0.00265, -0.00194, -0.00336 and -0.00271 m.
        $horizontalPoint = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_JGD2024), new Degree(24.4 + 15 / 3600), new Degree(122.875 + 22.5 / 3600), null);
        $grid = (new PatchJGDHeightJGD2011JGD2024JapanProvider())->provideGrid();
        $from = VerticalPoint::create(Vertical::fromSRID(Vertical::EPSG_JGD2011_VERTICAL_HEIGHT), new Metre(100));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_JGD2024_VERTICAL_HEIGHT);
        $to = $from->offsetFromGrid($toCRS, $grid, false, $horizontalPoint);

        self::assertEqualsWithDelta(99.997335, $to->getHeight()->getValue(), 0.0000001);

        $back = $to->offsetFromGrid(Vertical::fromSRID(Vertical::EPSG_JGD2011_VERTICAL_HEIGHT), $grid, true, $horizontalPoint);
        self::assertEqualsWithDelta(100.0, $back->getHeight()->getValue(), 0.0000001);
    }

    public function testVerticalOffsetUsingNeuVelocityGrid(): void
    {
        if (!class_exists(NTv2VelNAD83CSRSv7CanadaProvider::class)) {
            self::markTestSkipped('North America datapack not installed');
        }

        // EPSG vertical offset by velocity grid: CGVD2013a(2010) 396.737 m to the 1997 snapshot.
        $horizontal = GeographicPoint::create(
            Geographic2D::fromSRID(Geographic2D::EPSG_NAD83_CSRS_V6),
            Degree::fromDegreeMinuteSecondHemisphere('49°53\'09.293"N'),
            Degree::fromDegreeMinuteSecondHemisphere('99°54\'41.057"W'),
            null
        );
        $grid = (new NTv2VelNAD83CSRSv7CanadaProvider())->provideGrid();
        $from = VerticalPoint::create(
            Vertical::fromSRID(Vertical::EPSG_CGVD2013A_2010_HEIGHT),
            new Metre(396.737),
            (new Year(2010.0))->asDateTime()
        );
        $to = $from->verticalOffsetUsingNeuVelocityGrid(
            Vertical::fromSRID(Vertical::EPSG_CGVD2013A_1997_HEIGHT),
            $grid,
            $horizontal
        );

        self::assertEqualsWithDelta(396.761, $to->getHeight()->asMetres()->getValue(), 0.001);
        self::assertEquals(1997.0, Year::fromDateTime($to->getCoordinateEpoch())->getValue());

        $back = $to->verticalOffsetUsingNeuVelocityGrid(
            Vertical::fromSRID(Vertical::EPSG_CGVD2013A_2010_HEIGHT),
            $grid,
            $horizontal
        );
        self::assertEqualsWithDelta(396.737, $back->getHeight()->asMetres()->getValue(), 0.001);
        self::assertEquals(2010.0, Year::fromDateTime($back->getCoordinateEpoch())->getValue());
    }

    #[DataProvider('supportedOperations')]
    #[Group('integration')]
    public function testOperations(string $sourceCrsSrid, string $targetCrsSrid, string $operationSrid): void
    {
        $sourceCRS = Vertical::fromSRID($sourceCrsSrid);
        $targetCRS = Vertical::fromSRID($targetCrsSrid);

        $operation = CoordinateOperations::getOperationData($operationSrid);
        $method = CoordinateOperationMethods::getMethodData($operation['method']);

        $epoch = new DateTime();

        $originalPoint = VerticalPoint::create($sourceCRS, new Metre(0), $epoch);
        $horizontalCentre = ExtentInteriorPoints::get($operation['extent']);
        $horizontalPoint = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84), $horizontalCentre[0], $horizontalCentre[1], null);

        $newPoint = $originalPoint->performOperation($operationSrid, $targetCRS, false, new Metre(0), ['horizontalPoint' => $horizontalPoint]);
        self::assertInstanceOf(Point::class, $newPoint);
        self::assertEquals($targetCRS, $newPoint->getCRS());

        if ($method['reversible']) {
            $reversedPoint = $newPoint->performOperation($operationSrid, $sourceCRS, true, new Metre(0), ['horizontalPoint' => $horizontalPoint]);

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

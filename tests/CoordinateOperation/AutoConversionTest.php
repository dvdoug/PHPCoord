<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use function array_unique;
use function class_exists;
use DateTime;
use function explode;
use function fgetcsv;
use function fopen;
use PHPCoord\CompoundPoint;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Exception\UnknownConversionException;
use PHPCoord\GeocentricPoint;
use PHPCoord\GeographicPoint;
use PHPCoord\Geometry\BoundingArea;
use PHPCoord\Point;
use PHPCoord\ProjectedPoint;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UTMPoint;
use PHPCoord\VerticalPoint;
use PHPUnit\Framework\TestCase;

class AutoConversionTest extends TestCase
{
    public function testWGS72ToWGS84(): void
    {
        $from = GeographicPoint::create(new Degree(55.0), new Degree(44.0), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_72));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(55.000025, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(44.000154, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function testOSGB36ToBritishNationalGrid(): void
    {
        $from = GeographicPoint::create(new Degree(50.5), new Degree(0.5), null, Geographic2D::fromSRID(Geographic2D::EPSG_OSGB36));
        $toCRS = Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(577274.99, $to->getEasting()->asMetres()->getValue(), 0.01);
        self::assertEqualsWithDelta(69740.50, $to->getNorthing()->asMetres()->getValue(), 0.01);
    }

    public function testNoop(): void
    {
        $from = GeographicPoint::create(new Degree(40.7127), new Degree(-74.0059), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->convert($toCRS);

        self::assertSame($from, $to);
    }

    public function testVanuaLevuGrid(): void
    {
        $from = GeographicPoint::create(new Radian(-0.293938867), new Radian(3.141493807), null, Geographic2D::fromSRID(Geographic2D::EPSG_VANUA_LEVU_1915));
        $toCRS = Projected::fromSRID(Projected::EPSG_VANUA_LEVU_1915_VANUA_LEVU_GRID);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(1601528.90, $to->getEasting()->getValue(), 0.1);
        self::assertEqualsWithDelta(1336966.01, $to->getNorthing()->getValue(), 0.1);
    }

    public function testTM75ToETRS89(): void
    {
        $from = GeographicPoint::create(new Degree(55), new Degree(-6.5), null, Geographic2D::fromSRID(Geographic2D::EPSG_TM75));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(55.00002972, $to->getLatitude()->getValue(), 0.00000001);
        self::assertEqualsWithDelta(-6.50094913, $to->getLongitude()->getValue(), 0.00000001);
    }

    public function testED50ToED87(): void
    {
        $from = GeographicPoint::create(new Degree(52.508333333), new Degree(2), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED50));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_ED87);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(52.508330203, $to->getLatitude()->getValue(), 0.00000001);
        self::assertEqualsWithDelta(2.000009801, $to->getLongitude()->getValue(), 0.00000001);
    }

    public function testED87ToED50(): void
    {
        $from = GeographicPoint::create(new Degree(52.508330203), new Degree(2.000009801), null, Geographic2D::fromSRID(Geographic2D::EPSG_ED87));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_ED50);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(52.508333333, $to->getLatitude()->getValue(), 0.00000001);
        self::assertEqualsWithDelta(2, $to->getLongitude()->getValue(), 0.00000001);
    }

    // Issue #23
    public function testBerlinPointPlacedIntoZone33WhenCalculatedAutomatically(): void
    {
        $from = GeographicPoint::create(new Degree(52.518590), new Degree(13.375520), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $toCRS = Projected::fromSRID(Projected::EPSG_WGS_84_UTM_GRID_SYSTEM_NORTHERN_HEMISPHERE);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(33389776, $to->getEasting()->getValue(), 1);
        self::assertEqualsWithDelta(5819959, $to->getNorthing()->getValue(), 1);
    }

    // Issue #23
    public function testBerlinPointNotZone32(): void
    {
        $this->expectException(UnknownConversionException::class);
        $from = GeographicPoint::create(new Degree(52.518590), new Degree(13.375520), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $toCRS = Projected::fromSRID(Projected::EPSG_WGS_84_UTM_ZONE_32N);
        $to = $from->convert($toCRS);
    }

    // Issue #23
    public function testBerlinPointZone32WhenForced(): void
    {
        $from = GeographicPoint::create(new Degree(52.518590), new Degree(13.375520), null, Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $toCRS = Projected::fromSRID(Projected::EPSG_WGS_84_UTM_ZONE_32N);
        $to = $from->convert($toCRS, true);

        self::assertEqualsWithDelta(796823.561, $to->getEasting()->getValue(), 0.001);
        self::assertEqualsWithDelta(5827721.404, $to->getNorthing()->getValue(), 0.001);
    }

    public function testUTMPointToUTMEPSG(): void
    {
        $from = new UTMPoint(new Metre(796823.561), new Metre(5827721.404), 32, 'N', Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84));
        $toCRS = Projected::fromSRID(Projected::EPSG_WGS_84_UTM_ZONE_32N);
        $to = $from->convert($toCRS, true);

        self::assertEqualsWithDelta(796823.561, $to->getEasting()->getValue(), 0.001);
        self::assertEqualsWithDelta(5827721.404, $to->getNorthing()->getValue(), 0.001);
    }

    public function testTokyoJSLDToWGS842D(): void
    {
        $from = CompoundPoint::create(GeographicPoint::create(new Degree(35.689722), new Degree(139.692222), null, Geographic2D::fromSRID(Geographic2D::EPSG_TOKYO)), VerticalPoint::create(new Metre(100), Vertical::fromSRID(Vertical::EPSG_JSLD69_HEIGHT)), Compound::fromSRID(Compound::EPSG_TOKYO_PLUS_JSLD69_HEIGHT));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(35.692958, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(139.689019, $to->getLongitude()->getValue(), 0.000001);
        self::assertNull($to->getHeight());
    }

    public function testTokyoJSLDToWGS843D(): void
    {
        $from = CompoundPoint::create(GeographicPoint::create(new Degree(35.689722), new Degree(139.692222), null, Geographic2D::fromSRID(Geographic2D::EPSG_TOKYO)), VerticalPoint::create(new Metre(100), Vertical::fromSRID(Vertical::EPSG_JSLD69_HEIGHT)), Compound::fromSRID(Compound::EPSG_TOKYO_PLUS_JSLD69_HEIGHT));
        $toCRS = Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(35.692958, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(139.689019, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(138.5, $to->getHeight()->getValue(), 0.001);
    }

    public function testPZ9011ToITRF2008(): void
    {
        $from = GeocentricPoint::create(new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656), Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11), new DateTime('2010-01-01'));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(2845455.9734, $to->getX()->getValue(), 0.0001);
        self::assertEqualsWithDelta(2160954.3068, $to->getY()->getValue(), 0.0001);
        self::assertEqualsWithDelta(5265993.2648, $to->getZ()->getValue(), 0.0001);
    }

    public function testPZ9011ToITRF2008NoEpoch(): void
    {
        $this->expectException(UnknownConversionException::class);
        $from = GeocentricPoint::create(new Metre(2845455.9753), new Metre(2160954.3073), new Metre(5265993.2656), Geocentric::fromSRID(Geocentric::EPSG_PZ_90_11));
        $toCRS = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
        $to = $from->convert($toCRS);
    }

    public function testBritishNationalGridToOSGB(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(573502.85), new Metre(180912.71), Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_OSGB36);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(51.5, $to->getLatitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(0.5, $to->getLongitude()->getValue(), 0.0001);
    }

    public function testBritishNationalGridToUTM(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(573502.85), new Metre(180912.71), Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID));
        $toCRS = Projected::fromSRID(Projected::EPSG_WGS_84_UTM_GRID_SYSTEM_NORTHERN_HEMISPHERE);
        $to = $from->convert($toCRS);

        if (class_exists(OSTN15OSGM15Provider::class)) {
            self::assertEqualsWithDelta(31326368.174145, $to->getEasting()->getValue(), 0.0001);
            self::assertEqualsWithDelta(5708455.8991285, $to->getNorthing()->getValue(), 0.0001);
        } else {
            self::assertEqualsWithDelta(31326366.159092, $to->getEasting()->getValue(), 0.0001);
            self::assertEqualsWithDelta(5708455.7715515, $to->getNorthing()->getValue(), 0.0001);
        }
    }

    public function testETRSLN02ToETRSEVRF2000(): void
    {
        $fromCRS = new Compound(
            'notANEPSGCRS',
            Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89),
            Vertical::fromSRID(Vertical::EPSG_LN02_HEIGHT),
            BoundingArea::createWorld(),
        );

        $from = CompoundPoint::create(GeographicPoint::create(new Radian(0.826122513), new Radian(0.168715161), null, Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89)), VerticalPoint::create(new Metre(473), Vertical::fromSRID(Vertical::EPSG_LN02_HEIGHT)), $fromCRS);
        $toCRS = Compound::fromSRID(Compound::EPSG_ETRS89_PLUS_EVRF2000_HEIGHT);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(0.826122513, $to->getHorizontalPoint()->getLatitude()->asRadians()->getValue(), 0.0000000001);
        self::assertEqualsWithDelta(0.168715161, $to->getHorizontalPoint()->getLongitude()->asRadians()->getValue(), 0.0000000001);
        self::assertEqualsWithDelta(472.69, $to->getVerticalPoint()->getHeight()->asMetres()->getValue(), 0.001);
    }

    public function testETRS89ToBritishNationalGrid(): void
    {
        $from = GeographicPoint::create(new Degree(52.658007833), new Degree(1.716073972), null, Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89));
        $toCRS = Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID);
        $to = $from->convert($toCRS);

        if (class_exists(OSTN15OSGM15Provider::class)) {
            self::assertEqualsWithDelta(651409.804, $to->getEasting()->asMetres()->getValue(), 0.001);
            self::assertEqualsWithDelta(313177.450, $to->getNorthing()->asMetres()->getValue(), 0.001);
        } else {
            self::assertEqualsWithDelta(651411.218, $to->getEasting()->asMetres()->getValue(), 0.001);
            self::assertEqualsWithDelta(313180.597, $to->getNorthing()->asMetres()->getValue(), 0.001);
        }
    }

    public function testNAD27ToNAD83USA(): void
    {
        $from = GeographicPoint::create(new Degree(40.689247), new Degree(-74.044502), null, Geographic2D::fromSRID(Geographic2D::EPSG_NAD27));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_NAD83);
        $to = $from->convert($toCRS);

        if (class_exists(NADCON5NAD27NAD831986CONUSLatitudeProvider::class)) {
            self::assertEqualsWithDelta(40.6893492339, $to->getLatitude()->asDegrees()->getValue(), 0.00000001);
            self::assertEqualsWithDelta(-74.0440875374, $to->getLongitude()->asDegrees()->getValue(), 0.00000001);
        } else {
            self::assertEqualsWithDelta(40.689247679943, $to->getLatitude()->asDegrees()->getValue(), 0.00000001);
            self::assertEqualsWithDelta(-74.044072669722, $to->getLongitude()->asDegrees()->getValue(), 0.00000001);
        }
    }

    public function testNAD27ToNAD83Canada(): void
    {
        $from = GeographicPoint::create(new Degree(50.8713458), new Degree(-114.2934808), null, Geographic2D::fromSRID(Geographic2D::EPSG_NAD27));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_NAD83);
        $to = $from->convert($toCRS);

        if (class_exists(NTv2NAD27NAD83CanadaProvider::class)) {
            self::assertEqualsWithDelta(50.871401224, $to->getLatitude()->asDegrees()->getValue(), 0.00000001);
            self::assertEqualsWithDelta(-114.294481160, $to->getLongitude()->asDegrees()->getValue(), 0.00000001);
        } else {
            self::assertEqualsWithDelta(50.871338980, $to->getLatitude()->asDegrees()->getValue(), 0.00000001);
            self::assertEqualsWithDelta(-114.29435830, $to->getLongitude()->asDegrees()->getValue(), 0.00000001);
        }
    }

    public function testAmersfoortRDNewToWGS84(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(86058.2205), new Metre(445832.8025), Projected::fromSRID(Projected::EPSG_AMERSFOORT_RD_NEW));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(51.996591992, $to->getLatitude()->asDegrees()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(4.383328547, $to->getLongitude()->asDegrees()->getValue(), 0.0000001);
    }

    public function testNTFToRGF93(): void
    {
        $from = GeographicPoint::create(new Degree(48.84451225), new Degree(2.42567186), null, Geographic2D::fromSRID(Geographic2D::EPSG_NTF));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_RGF93_V1);
        $to = $from->convert($toCRS);

        if (class_exists(IGNFGeocentricTranslationNTFRGF93Provider::class)) {
            self::assertEqualsWithDelta(48.844445839, $to->getLatitude()->asDegrees()->getValue(), 0.0000001);
            self::assertEqualsWithDelta(2.424971108, $to->getLongitude()->asDegrees()->getValue(), 0.0000001);
        } else {
            self::assertEqualsWithDelta(48.844443517, $to->getLatitude()->asDegrees()->getValue(), 0.0000001);
            self::assertEqualsWithDelta(2.424952023, $to->getLongitude()->asDegrees()->getValue(), 0.0000001);
        }
    }

    public function testNZGD2000PlusNZVD2016ToNZGD2000(): void
    {
        if (!class_exists(GTXNZGeoid2016Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-oceania');
        }

        $from = CompoundPoint::create(
            GeographicPoint::create(
                new Degree(-36.9003),
                new Degree(174.7794),
                null,
                Geographic2D::fromSRID(Geographic2D::EPSG_NZGD2000)
            ),
            VerticalPoint::create(
                new Metre(15.715),
                Vertical::fromSRID(Vertical::EPSG_NZVD2016_HEIGHT)
            ),
            Compound::fromSRID(Compound::EPSG_NZGD2000_PLUS_NZVD2016_HEIGHT)
        );
        $toCRS = Geographic3D::fromSRID(Geographic3D::EPSG_NZGD2000);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(-36.9003, $to->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(174.7794, $to->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(50.000, $to->getHeight()->getValue(), 0.0001);
    }

    public function testNAD83ToNAVD88CONUS(): void
    {
        if (!class_exists(GTXGEOID18CONUSProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-northamerica');
        }

        $from = GeographicPoint::create(new Degree(40), new Degree(-100), new Metre(0), Geographic3D::fromSRID(Geographic3D::EPSG_NAD83_2011));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_NAVD88_HEIGHT);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(24.555, $to->getHeight()->getValue(), 0.001);
    }

    public function testETRS89ToETRS89PlusNAP(): void
    {
        if (!class_exists(GTXETRS89NAPProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }

        $from = GeographicPoint::create(new Degree(51.825323002), new Degree(5.049883673), new Metre(3.4374), Geographic3D::fromSRID(Geographic3D::EPSG_ETRS89));
        $toCRS = Compound::fromSRID(Compound::EPSG_ETRS89_PLUS_NAP_HEIGHT);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(51.825323002, $to->getHorizontalPoint()->getLatitude()->asDegrees()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(5.049883673, $to->getHorizontalPoint()->getLongitude()->asDegrees()->getValue(), 0.0000001);
        self::assertEqualsWithDelta(-40.1293, $to->getVerticalPoint()->getHeight()->asMetres()->getValue(), 0.00001);
    }

    /**
     * @group integration
     * @dataProvider EPSGConcatenatedOperations
     */
    public function testEPSGConcatenatedOperations(string $sourceCrsSrid, string $targetCrsSrid, array $extentCodes, bool $canReverse): void
    {
        $extent = BoundingArea::createFromExtentCodes($extentCodes);

        $sourceCRS = CoordinateReferenceSystem::fromSRID($sourceCrsSrid);
        $epoch = new DateTime();

        if ($sourceCRS instanceof Compound) {
            $sourceCRS = Compound::fromSRID($sourceCrsSrid);
            $sourceHorizontalCRS = $sourceCRS->getHorizontal();
            if ($sourceHorizontalCRS instanceof Geographic2D) {
                $centre = $extent->getPointInside();
                $centre[1] = $centre[1]->subtract($sourceCRS->getHorizontal()->getDatum()->getPrimeMeridian()->getGreenwichLongitude()); //compensate for non-Greenwich prime meridian

                $horizontalPoint = GeographicPoint::create($centre[0], $centre[1], null, $sourceHorizontalCRS);
            } elseif ($sourceHorizontalCRS instanceof Geographic2D) {
                $horizontalPoint = ProjectedPoint::create(new Metre(0), new Metre(0), new Metre(0), new Metre(0), $sourceHorizontalCRS);
            }
            $verticalCRS = $sourceCRS->getVertical();
            $verticalPoint = VerticalPoint::create(new Metre(0), $verticalCRS);

            $originalPoint = CompoundPoint::create($horizontalPoint, $verticalPoint, $sourceCRS, $epoch);
        } elseif ($sourceCRS instanceof Geographic) {
            $centre = $extent->getPointInside();
            $centre[1] = $centre[1]->subtract($sourceCRS->getDatum()->getPrimeMeridian()->getGreenwichLongitude()); //compensate for non-Greenwich prime meridian
            $height = $sourceCRS instanceof Geographic3D ? new Metre(0) : null;

            $originalPoint = GeographicPoint::create($centre[0], $centre[1], $height, $sourceCRS, $epoch);
        } elseif ($sourceCRS instanceof Geocentric) {
            $centre = $extent->getPointInside();
            $centre = (new GeographicValue($centre[0], $centre[1], new Metre(0), $sourceCRS->getDatum()))->asGeocentricValue();
            $originalPoint = GeocentricPoint::create($centre->getX(), $centre->getY(), $centre->getZ(), $sourceCRS, $epoch);
        } elseif ($sourceCRS instanceof Vertical) {
            $originalPoint = VerticalPoint::create(new Metre(0), $sourceCRS, $epoch);
        }

        $targetCRS = CoordinateReferenceSystem::fromSRID($targetCrsSrid);
        $newPoint = $originalPoint->convert($targetCRS);
        self::assertInstanceOf(Point::class, $newPoint);
        self::assertEquals($targetCRS, $newPoint->getCRS());

        if ($canReverse) {
            $reversedPoint = $newPoint->convert($sourceCRS);

            self::assertEquals($sourceCRS, $reversedPoint->getCRS());

            if ($sourceCRS instanceof Compound) {
                self::assertEqualsWithDelta($originalPoint->getHorizontalPoint()->getLatitude()->getValue(), $reversedPoint->getHorizontalPoint()->getLatitude()->getValue(), 0.001);
                self::assertEqualsWithDelta($originalPoint->getHorizontalPoint()->getLongitude()->getValue(), $reversedPoint->getHorizontalPoint()->getLongitude()->getValue(), 0.001);
                self::assertEqualsWithDelta($originalPoint->getVerticalPoint()->getHeight()->getValue(), $reversedPoint->getVerticalPoint()->getHeight()->getValue(), 0.001);
            } elseif ($sourceCRS instanceof Geographic) {
                self::assertEqualsWithDelta($originalPoint->getLatitude()->getValue(), $reversedPoint->getLatitude()->getValue(), 0.001);
                self::assertEqualsWithDelta($originalPoint->getLongitude()->getValue(), $reversedPoint->getLongitude()->getValue(), 0.001);
                if ($sourceCRS instanceof Geographic3D) {
                    self::assertEqualsWithDelta($originalPoint->getHeight()->getValue(), $reversedPoint->getHeight()->getValue(), 0.001);
                }
            }
        }
    }

    public function EPSGConcatenatedOperations(): array
    {
        $toTest = [];

        $dataFile = fopen(__DIR__ . '/EPSGConcatenatedOperations.csv', 'rb');
        while ($data = fgetcsv($dataFile)) {
            $toTest[$data[0] . ':' . $data[1]] = [$data[2], $data[3], array_unique(explode('|', $data[4])), (bool) $data[5]];
        }

        return $toTest;
    }
}

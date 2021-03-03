<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use DateTime;
use PHPCoord\CompoundPoint;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Exception\UnknownConversionException;
use PHPCoord\GeocentricPoint;
use PHPCoord\GeographicPoint;
use PHPCoord\Geometry\GeographicPolygon;
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
        $from = GeographicPoint::create(new Degree(50.5), new Degree(0.5), null, Geographic2D::fromSRID(Geographic2D::EPSG_OSGB_1936));
        $toCRS = Projected::fromSRID(Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID);
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
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(577274.99), new Metre(69740.50), Projected::fromSRID(Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID));
        $toCRS = Geographic2D::fromSRID(Geographic2D::EPSG_OSGB_1936);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(50.5, $to->getLatitude()->getValue(), 0.0001);
        self::assertEqualsWithDelta(0.5, $to->getLongitude()->getValue(), 0.0001);
    }

    public function testBritishNationalGridToUTM(): void
    {
        $from = ProjectedPoint::createFromEastingNorthing(new Metre(577274.99), new Metre(69740.50), Projected::fromSRID(Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID));
        $toCRS = Projected::fromSRID(Projected::EPSG_WGS_84_UTM_GRID_SYSTEM_NORTHERN_HEMISPHERE);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(31322594.503502, $to->getEasting()->getValue(), 0.0001);
        self::assertEqualsWithDelta(5597286.6916335, $to->getNorthing()->getValue(), 0.0001);
    }

    public function testETRSLN02ToETRSEVRF2000(): void
    {
        $fromCRS = new Compound(
            'notANEPSGCRS',
            Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89),
            Vertical::fromSRID(Vertical::EPSG_LN02_HEIGHT),
            GeographicPolygon::createWorld(),
        );

        $from = CompoundPoint::create(GeographicPoint::create(new Radian(0.826122513), new Radian(0.168715161), null, Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89)), VerticalPoint::create(new Metre(473), Vertical::fromSRID(Vertical::EPSG_LN02_HEIGHT)), $fromCRS);
        $toCRS = Compound::fromSRID(Compound::EPSG_ETRS89_PLUS_EVRF2000_HEIGHT);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(0.826122513, $to->getHorizontalPoint()->getLatitude()->asRadians()->getValue(), 0.0000000001);
        self::assertEqualsWithDelta(0.168715161, $to->getHorizontalPoint()->getLongitude()->asRadians()->getValue(), 0.0000000001);
        self::assertEqualsWithDelta(472.69, $to->getVerticalPoint()->getHeight()->asMetres()->getValue(), 0.001);
    }
}

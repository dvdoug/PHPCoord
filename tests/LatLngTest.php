<?php

declare(strict_types=1);

namespace PHPCoord;

use OutOfRangeException;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class LatLngTest extends TestCase
{
    public function testToString(): void
    {
        $LatLng = new LatLng(51.54105, -0.12319, 0, RefEll::airy1830());
        $expected = '(51.54105, -0.12319)';

        self::assertEquals($expected, $LatLng->__toString());
    }

    public function testOSRefWorkHQ(): void
    {
        $LatLng = new LatLng(51.54105, -0.12319, 0, RefEll::airy1830());
        $OSRef = $LatLng->toOSRef();

        $expected = '(530140, 184184)';

        self::assertEquals($expected, $OSRef->__toString());
    }

    public function testOSRefOSWorkedExample(): void
    {
        $LatLng = new LatLng(52.65757, 1.71792, 0, RefEll::airy1830());
        $OSRef = $LatLng->toOSRef();

        $expected = '(651410, 313177)';

        self::assertEquals($expected, $OSRef->__toString());
    }

    public function testOSRefOSWorkedBadEllipsoid(): void
    {
        $this->expectException(RuntimeException::class);
        $LatLng = new LatLng(12.3, 12.3, 0, new RefEll(123, 456));
        $OSRef = $LatLng->toOSRef();
    }

    public function testToWGS84BadEllipsoid(): void
    {
        $this->expectException(RuntimeException::class);
        $LatLng = new LatLng(12.3, 12.3, 0, new RefEll(123, 456));
        $LatLng->toWGS84();
    }

    public function testWGS84ToED50(): void
    {
        $LatLng = new LatLng(12.3, 12.3, 0, RefEll::wgs84());
        $asED50 = $LatLng->toED50();

        $expected = '(12.30121, 12.30071)';
        self::assertEquals($expected, $asED50->__toString());
    }

    public function testED50ToWGS84(): void
    {
        $LatLng = new LatLng(12.30121, 12.30071, 0, RefEll::international1924());
        $asWGS84 = $LatLng->toWGS84();

        $expected = '(12.3, 12.3)';
        self::assertEquals($expected, $asWGS84->__toString());
    }

    public function testWGS84ToNAD27(): void
    {
        $LatLng = new LatLng(12.3, 12.3, 0, RefEll::wgs84());
        $asNAD27 = $LatLng->toNAD27();

        $expected = '(12.29939, 12.29855)';
        self::assertEquals($expected, $asNAD27->__toString());
    }

    public function testNAD27ToWGS84(): void
    {
        $LatLng = new LatLng(12.29939, 12.29855, 0, RefEll::clarke1866());
        $asWGS84 = $LatLng->toWGS84();

        $expected = '(12.3, 12.3)';
        self::assertEquals($expected, $asWGS84->__toString());
    }

    public function testWGS84ToIreland75(): void
    {
        $LatLng = new LatLng(12.3, 12.3, 0, RefEll::wgs84());
        $asIreland1975 = $LatLng->toIreland1975();

        $expected = '(12.29558, 12.30223)';
        self::assertEquals($expected, $asIreland1975->__toString());
    }

    public function testIreland75ToWGS84(): void
    {
        $LatLng = new LatLng(12.29558, 12.30223, 0, RefEll::airyModified());
        $asWGS84 = $LatLng->toWGS84();

        $expected = '(12.3, 12.3)';
        self::assertEquals($expected, $asWGS84->__toString());
    }

    public function testUTMRefWorkHQ(): void
    {
        $LatLng = new LatLng(51.54098, -0.12301, 0, RefEll::airy1830());
        $UTMRef = $LatLng->toUTMRef();

        $expected = '30U 699388 5713962';

        self::assertEquals($expected, $UTMRef->__toString());
    }

    public function testUTMRefSydney(): void
    {
        $LatLng = new LatLng(-33.859972, 151.211111, 0, RefEll::wgs84());
        $UTMRef = $LatLng->toUTMRef();

        $expected = '56H 334519 6251930';

        self::assertEquals($expected, $UTMRef->__toString());
    }

    public function testUTMRefStavanger(): void
    {
        $LatLng = new LatLng(58.963333, 5.718889, 0, RefEll::wgs84());
        $UTMRef = $LatLng->toUTMRef();

        $expected = '32V 311341 6540600';

        self::assertEquals($expected, $UTMRef->__toString());
    }

    public function testUTMRefSvalbard1(): void
    {
        $LatLng = new LatLng(78.75, 8, 0, RefEll::wgs84());
        $UTMRef = $LatLng->toUTMRef();

        $expected = '31X 608767 8746730';

        self::assertEquals($expected, $UTMRef->__toString());
    }

    public function testUTMRefSvalbard2(): void
    {
        $LatLng = new LatLng(78.75, 16, 0, RefEll::wgs84());
        $UTMRef = $LatLng->toUTMRef();

        $expected = '33X 521778 8742259';

        self::assertEquals($expected, $UTMRef->__toString());
    }

    public function testUTMRefSvalbard3(): void
    {
        $LatLng = new LatLng(78.75, 32, 0, RefEll::wgs84());
        $UTMRef = $LatLng->toUTMRef();

        $expected = '35X 608767 8746730';

        self::assertEquals($expected, $UTMRef->__toString());
    }

    public function testUTMRefSvalbard4(): void
    {
        $LatLng = new LatLng(78.75, 36, 0, RefEll::wgs84());
        $UTMRef = $LatLng->toUTMRef();

        $expected = '37X 434691 8743750';

        self::assertEquals($expected, $UTMRef->__toString());
    }

    public function testUTMRefArtic(): void
    {
        $this->expectException(OutOfRangeException::class);
        $LatLng = new LatLng(84.00001, 123, 0, RefEll::wgs84());
        $UTMRef = $LatLng->toUTMRef();
    }

    public function testUTMRefAntartic(): void
    {
        $this->expectException(OutOfRangeException::class);
        $LatLng = new LatLng(-80.00001, 123, 0, RefEll::wgs84());
        $UTMRef = $LatLng->toUTMRef();
    }

    public function testDistanceLatLngWorkHQtoCharingCross(): void
    {
        $work = new LatLng(51.54105, -0.12319, 0, RefEll::wgs84());
        $charingCross = new LatLng(51.507977, -0.124588, 0, RefEll::wgs84());

        $expected = 3679;

        self::assertEquals($expected, $work->distance($charingCross));
    }

    public function testDistanceDifferentEllipsoids(): void
    {
        $this->expectException(RuntimeException::class);
        $work = new LatLng(51.54105, -0.12319, 0, RefEll::airy1830());
        $charingCross = new LatLng(51.507977, -0.124588, 0, RefEll::wgs84());

        $expected = 3679;

        self::assertEquals($expected, $work->distance($charingCross));
    }

    public function testNoopTransformSanFrancisco(): void
    {
        $LatLng = new LatLng(37.783333, -122.416667, 0, RefEll::grs80());
        $LatLngTrans = clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::grs80(), 0, 0, 0, 0, 0, 0, 0);

        self::assertEquals($LatLng->getLat(), $LatLngTrans->getLat(), 'Latitude transform failed');
        self::assertEquals($LatLng->getLng(), $LatLngTrans->getLng(), 'Longitude transform failed');
    }

    public function testNoopTransformSydney(): void
    {
        $LatLng = new LatLng(-33.859972, 151.211111, 0, RefEll::grs80());
        $LatLngTrans = clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::grs80(), 0, 0, 0, 0, 0, 0, 0);

        self::assertEquals($LatLng->getLat(), $LatLngTrans->getLat(), 'Latitude transform failed');
        self::assertEquals($LatLng->getLng(), $LatLngTrans->getLng(), 'Longitude transform failed');
    }

    public function testNoopTransformLondon(): void
    {
        $LatLng = new LatLng(51.54105, -0.12319, 0, RefEll::grs80());
        $LatLngTrans = clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::grs80(), 0, 0, 0, 0, 0, 0, 0);

        self::assertEquals($LatLng->getLat(), $LatLngTrans->getLat(), 'Latitude transform failed');
        self::assertEquals($LatLng->getLng(), $LatLngTrans->getLng(), 'Longitude transform failed');
    }

    public function testNoopTransformTokyo(): void
    {
        $LatLng = new LatLng(35.694668, 139.693122, 0, RefEll::grs80());
        $LatLngTrans = clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::grs80(), 0, 0, 0, 0, 0, 0, 0);

        self::assertEquals($LatLng->getLat(), $LatLngTrans->getLat(), 'Latitude transform failed');
        self::assertEquals($LatLng->getLng(), $LatLngTrans->getLng(), 'Longitude transform failed');
    }

    public function testNoopTransformCapeTown(): void
    {
        $LatLng = new LatLng(-33.925278, 18.423889, 0, RefEll::grs80());
        $LatLngTrans = clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::grs80(), 0, 0, 0, 0, 0, 0, 0);

        self::assertEquals($LatLng->getLat(), $LatLngTrans->getLat(), 'Latitude transform failed');
        self::assertEquals($LatLng->getLng(), $LatLngTrans->getLng(), 'Longitude transform failed');
    }

    public function testNoopTransformNewYork(): void
    {
        $LatLng = new LatLng(40.7127, -74.0059, 0, RefEll::grs80());
        $LatLngTrans = clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::grs80(), 0, 0, 0, 0, 0, 0, 0);

        self::assertEquals($LatLng->getLat(), $LatLngTrans->getLat(), 'Latitude transform failed');
        self::assertEquals($LatLng->getLng(), $LatLngTrans->getLng(), 'Longitude transform failed');
    }
}

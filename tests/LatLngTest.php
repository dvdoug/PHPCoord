<?php

namespace PHPCoord;

class LatLngTest extends \PHPUnit_Framework_TestCase
{

    public function testToString()
    {

        $LatLng = new LatLng(51.54105, -0.12319, 0, RefEll::airy1830());
        $expected = "(51.54105, -0.12319)";

        self::assertEquals($expected, $LatLng->__toString());
    }

    public function testOSRefWorkHQ()
    {

        $LatLng = new LatLng(51.54105, -0.12319, 0, RefEll::airy1830());
        $OSRef = $LatLng->toOSRef();

        $expected = "(530140, 184184)";

        self::assertEquals($expected, $OSRef->__toString());
    }

    public function testOSRefOSWorkedExample()
    {

        $LatLng = new LatLng(52.65757, 1.71792, 0, RefEll::airy1830());
        $OSRef = $LatLng->toOSRef();

        $expected = "(651410, 313177)";

        self::assertEquals($expected, $OSRef->__toString());
    }


    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testOSRefOSWorkedBadEllipsoid()
    {

        $LatLng = new LatLng(12.3, 12.3, 0, RefEll::clarke1866());
        $OSRef = $LatLng->toOSRef();
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testOSGB36ToWGS84BadEllipsoid()
    {

        $LatLng = new LatLng(12.3, 12.3, 0, RefEll::heyford1924());
        $LatLng->OSGB36ToWGS84();
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testWGS84ToOSGB36BadEllipsoid()
    {

        $LatLng = new LatLng(12.3, 12.3, 0, RefEll::clarke1866());
        $LatLng->WGS84ToOSGB36();
    }

    public function testWGS84ToED50()
    {

        $LatLng = new LatLng(12.3, 12.3, 0, RefEll::wgs84());
        $LatLng->WGS84ToED50();

        $expected = "(12.30121, 12.30071)";
        self::assertEquals($expected, $LatLng->__toString());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testWGS84ToED50BadEllipsoid()
    {

        $LatLng = new LatLng(12.3, 12.3, 0, RefEll::bessel1841());
        $LatLng->WGS84ToED50();
    }

    public function testED50ToWGS84()
    {

        $LatLng = new LatLng(12.30121, 12.30071, 0, RefEll::heyford1924());
        $LatLng->ED50ToWGS84();

        $expected = "(12.3, 12.3)";
        self::assertEquals($expected, $LatLng->__toString());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testED50ToWGS84BadEllipsoid()
    {

        $LatLng = new LatLng(12.3, 12.3, 0, RefEll::grs80());
        $LatLng->ED50ToWGS84();
    }

    public function testWGS84ToNAD27()
    {

        $LatLng = new LatLng(12.3, 12.3, 0, RefEll::wgs84());
        $LatLng->WGS84ToNAD27();

        $expected = "(12.29939, 12.29855)";
        self::assertEquals($expected, $LatLng->__toString());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testWGS84ToNAD27BadEllipsoid()
    {

        $LatLng = new LatLng(12.3, 12.3, 0, RefEll::international1924());
        $LatLng->WGS84ToNAD27();
    }

    public function testNAD27ToWGS84()
    {

        $LatLng = new LatLng(12.3, 12.3, 0, RefEll::clarke1866());
        $LatLng->NAD27ToWGS84();

        $expected = "(12.30061, 12.30145)";
        self::assertEquals($expected, $LatLng->__toString());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testNAD27ToWGS84BadEllipsoid()
    {

        $LatLng = new LatLng(12.3, 12.3, 0, RefEll::international1924());
        $LatLng->NAD27ToWGS84();
    }

    public function testUTMRefWorkHQ()
    {

        $LatLng = new LatLng(51.54098, -0.12301, 0, RefEll::airy1830());
        $LatLng->OSGB36ToWGS84();
        $UTMRef = $LatLng->toUTMRef();

        $expected = "30U 699375 5713970";

        self::assertEquals($expected, $UTMRef->__toString());
    }

    public function testUTMRefSydney()
    {

        $LatLng = new LatLng(-33.859972, 151.211111, 0, RefEll::wgs84());
        $UTMRef = $LatLng->toUTMRef();

        $expected = "56H 334519 6251930";

        self::assertEquals($expected, $UTMRef->__toString());
    }

    /**
     * @expectedException \OutOfRangeException
     */
    public function testUTMRefArtic()
    {

        $LatLng = new LatLng(84.00001, 123, 0, RefEll::wgs84());
        $UTMRef = $LatLng->toUTMRef();
    }

    /**
     * @expectedException \OutOfRangeException
     */
    public function testUTMRefAntartic()
    {

        $LatLng = new LatLng(-80.00001, 123, 0, RefEll::wgs84());
        $UTMRef = $LatLng->toUTMRef();
    }

    public function testDistanceLatLngWorkHQtoCharingCross()
    {

        $work = new LatLng(51.54105, -0.12319, 0, RefEll::wgs84());
        $charingCross = new LatLng(51.507977, -0.124588, 0, RefEll::wgs84());

        $expected = 3678.49665;

        self::assertEquals($expected, $work->distance($charingCross));
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testDistanceDifferentEllipsoids()
    {

        $work = new LatLng(51.54105, -0.12319, 0, RefEll::airy1830());
        $charingCross = new LatLng(51.507977, -0.124588, 0, RefEll::wgs84());

        $expected = 3678.49665;

        self::assertEquals($expected, $work->distance($charingCross));
    }


    public function testNoopTransformSanFrancisco()
    {
        $LatLng = new LatLng(37.783333, -122.416667, 0, RefEll::grs80());
        $LatLngTrans=clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::grs80(), 0, 0, 0, 0, 0, 0, 0);

        $this->assertEquals($LatLng->getLat(),$LatLngTrans->getLat(),'Latitude transform failed');
        $this->assertEquals($LatLng->getLng(),$LatLngTrans->getLng(),'Longitude transform failed');
    }

    public function testNoopTransformSydney()
    {
        $LatLng = new LatLng(-33.859972, 151.211111, 0, RefEll::grs80());
        $LatLngTrans=clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::grs80(), 0, 0, 0, 0, 0, 0, 0);

        $this->assertEquals($LatLng->getLat(),$LatLngTrans->getLat(),'Latitude transform failed');
        $this->assertEquals($LatLng->getLng(),$LatLngTrans->getLng(),'Longitude transform failed');
    }

    public function testNoopTransformLondon()
    {
        $LatLng = new LatLng(51.54105, -0.12319, 0, RefEll::grs80());
        $LatLngTrans=clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::grs80(), 0, 0, 0, 0, 0, 0, 0);

        $this->assertEquals($LatLng->getLat(),$LatLngTrans->getLat(),'Latitude transform failed');
        $this->assertEquals($LatLng->getLng(),$LatLngTrans->getLng(),'Longitude transform failed');
    }

    public function testNoopTransformTokyo()
    {
        $LatLng = new LatLng(35.694668, 139.693122, 0, RefEll::grs80());
        $LatLngTrans=clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::grs80(), 0, 0, 0, 0, 0, 0, 0);

        $this->assertEquals($LatLng->getLat(),$LatLngTrans->getLat(),'Latitude transform failed');
        $this->assertEquals($LatLng->getLng(),$LatLngTrans->getLng(),'Longitude transform failed');
    }

    public function testNoopTransformCapeTown()
    {
        $LatLng = new LatLng(-33.925278, 18.423889, 0, RefEll::grs80());
        $LatLngTrans=clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::grs80(), 0, 0, 0, 0, 0, 0, 0);

        $this->assertEquals($LatLng->getLat(),$LatLngTrans->getLat(),'Latitude transform failed');
        $this->assertEquals($LatLng->getLng(),$LatLngTrans->getLng(),'Longitude transform failed');
    }

    public function testNoopTransformNewYork()
    {
        $LatLng = new LatLng(40.7127, -74.0059, 0, RefEll::grs80());
        $LatLngTrans=clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::grs80(), 0, 0, 0, 0, 0, 0, 0);

        $this->assertEquals($LatLng->getLat(),$LatLngTrans->getLat(),'Latitude transform failed');
        $this->assertEquals($LatLng->getLng(),$LatLngTrans->getLng(),'Longitude transform failed');
    }

}

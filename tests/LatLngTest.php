<?php

  namespace PHPCoord;

  require_once(__DIR__.'/../OSRef.php');
  require_once(__DIR__.'/../LatLng.php');
  require_once(__DIR__.'/../RefEll.php');
  require_once(__DIR__.'/../UTMRef.php');

  class LatLngTest extends \PHPUnit_Framework_TestCase {

    public function testToString() {

      $LatLng = new LatLng(51.54105, -0.12319);
      $expected = "(51.54105, -0.12319)";

      self::assertEquals($expected, $LatLng->__toString());
    }

    public function testOSRefWorkHQ() {

      $LatLng = new LatLng(51.54105, -0.12319);
      $OSRef = $LatLng->toOSRef();

      $expected = "(530140, 184184)";

      self::assertEquals($expected, $OSRef->__toString());
    }

    public function testOSRefOSWorkedExample() {

      $LatLng = new LatLng(52.65757, 1.71792);
      $OSRef = $LatLng->toOSRef();

      $expected = "(651410, 313177)";

      self::assertEquals($expected, $OSRef->__toString());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testOSRefOSWorkedBadEllipsoid() {

      $LatLng = new LatLng(12.3, 12.3, RefEll::Clarke1866());
      $OSRef = $LatLng->toOSRef();
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testOSGB36ToWGS84BadEllipsoid() {

      $LatLng = new LatLng(12.3, 12.3, RefEll::Heyford1924());
      $LatLng->OSGB36ToWGS84();
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testWGS84ToOSGB36BadEllipsoid() {

      $LatLng = new LatLng(12.3, 12.3, RefEll::Clarke1866());
      $LatLng->WGS84ToOSGB36();
    }

    public function testWGS84ToED50() {

      $LatLng = new LatLng(12.3, 12.3, RefEll::WGS84());
      $LatLng->WGS84ToED50();

      $expected = "(12.30121, 12.30071)";
      self::assertEquals($expected, $LatLng->__toString());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testWGS84ToED50BadEllipsoid() {

      $LatLng = new LatLng(12.3, 12.3, RefEll::Bessel1841());
      $LatLng->WGS84ToED50();
    }

    public function testED50ToWGS84() {

      $LatLng = new LatLng(12.30121, 12.30071, RefEll::Heyford1924());
      $LatLng->ED50ToWGS84();

      $expected = "(12.30069, 12.3)";
      self::assertEquals($expected, $LatLng->__toString());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testED50ToWGS84BadEllipsoid() {

      $LatLng = new LatLng(12.3, 12.3, RefEll::GRS80());
      $LatLng->ED50ToWGS84();
    }

    public function testWGS84ToNAD27() {

      $LatLng = new LatLng(12.3, 12.3, RefEll::WGS84());
      $LatLng->WGS84ToNAD27();

      $expected = "(12.29939, 12.29855)";
      self::assertEquals($expected, $LatLng->__toString());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testWGS84ToNAD27BadEllipsoid() {

      $LatLng = new LatLng(12.3, 12.3, RefEll::International1924());
      $LatLng->WGS84ToNAD27();
    }

    public function testNAD27ToWGS84() {

      $LatLng = new LatLng(12.3, 12.3, RefEll::Clarke1866());
      $LatLng->NAD27ToWGS84();

      $expected = "(12.30061, 12.30145)";
      self::assertEquals($expected, $LatLng->__toString());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testNAD27ToWGS84BadEllipsoid() {

      $LatLng = new LatLng(12.3, 12.3, RefEll::International1924());
      $LatLng->NAD27ToWGS84();
    }

    public function testUTMRefWorkHQ() {

      $LatLng = new LatLng(51.54105, -0.12319);
      $LatLng->OSGB36ToWGS84();
      $UTMRef = $LatLng->toUTMRef();

      $expected = "30U 699375 5713970";

      self::assertEquals($expected, $UTMRef->__toString());
    }

    public function testUTMRefSydney() {

      $LatLng = new LatLng(-33.859972, 151.211111);
      $UTMRef = $LatLng->toUTMRef();

      $expected = "56H 334519 6251930";

      self::assertEquals($expected, $UTMRef->__toString());
    }

    /**
     * @expectedException \OutOfRangeException
     */
    public function testUTMRefArtic() {

      $LatLng = new LatLng(84.00001, 123);
      $UTMRef = $LatLng->toUTMRef();
    }

    /**
     * @expectedException \OutOfRangeException
     */
    public function testUTMRefAntartic() {

      $LatLng = new LatLng(-80.00001, 123);
      $UTMRef = $LatLng->toUTMRef();
    }

    public function testDistanceLatLngWorkHQtoCharingCross() {

      $work = new LatLng(51.54105, -0.12319);
      $charingCross = new LatLng(51.507977, -0.124588);

      $expected = 3678.49665;

      self::assertEquals($expected, $work->distance($charingCross));
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testDistanceDifferentEllipsoids() {

      $work = new LatLng(51.54105, -0.12319, RefEll::Airy1830());
      $charingCross = new LatLng(51.507977, -0.124588);

      $expected = 3678.49665;

      self::assertEquals($expected, $work->distance($charingCross));
    }

    public function testNoopTransformSanFrancisco()
    {
        $LatLng = new LatLng(37.783333, -122.416667);
        $LatLngTrans=clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::GRS80(), RefEll::GRS80(), 0, 0, 0, 0, 0, 0, 0);

        $this->assertEquals($LatLng->lat,$LatLngTrans->lat,'Latitude transform failed');
        $this->assertEquals($LatLng->lng,$LatLngTrans->lng,'Longitude transform failed');
    }

    public function testNoopTransformSydney()
    {
        $LatLng = new LatLng(-33.859972, 151.211111);
        $LatLngTrans=clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::GRS80(), RefEll::GRS80(), 0, 0, 0, 0, 0, 0, 0);

        $this->assertEquals($LatLng->lat,$LatLngTrans->lat,'Latitude transform failed');
        $this->assertEquals($LatLng->lng,$LatLngTrans->lng,'Longitude transform failed');
    }

    public function testNoopTransformLondon()
    {
        $LatLng = new LatLng(51.54105, -0.12319);
        $LatLngTrans=clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::GRS80(), RefEll::GRS80(), 0, 0, 0, 0, 0, 0, 0);

        $this->assertEquals($LatLng->lat,$LatLngTrans->lat,'Latitude transform failed');
        $this->assertEquals($LatLng->lng,$LatLngTrans->lng,'Longitude transform failed');
    }

    public function testNoopTransformTokyo()
    {
        $LatLng = new LatLng(35.694668, 139.693122);
        $LatLngTrans=clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::GRS80(), RefEll::GRS80(), 0, 0, 0, 0, 0, 0, 0);

        $this->assertEquals($LatLng->lat,$LatLngTrans->lat,'Latitude transform failed');
        $this->assertEquals($LatLng->lng,$LatLngTrans->lng,'Longitude transform failed');
    }

    public function testNoopTransformCapeTown()
    {
        $LatLng = new LatLng(-33.925278, 18.423889);
        $LatLngTrans=clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::GRS80(), RefEll::GRS80(), 0, 0, 0, 0, 0, 0, 0);

        $this->assertEquals($LatLng->lat,$LatLngTrans->lat,'Latitude transform failed');
        $this->assertEquals($LatLng->lng,$LatLngTrans->lng,'Longitude transform failed');
    }

    public function testNoopTransformNewYork()
    {
        $LatLng = new LatLng(40.7127, -74.0059);
        $LatLngTrans=clone $LatLng;

        $LatLngTrans->transformDatum(RefEll::GRS80(), RefEll::GRS80(), 0, 0, 0, 0, 0, 0, 0);

        $this->assertEquals($LatLng->lat,$LatLngTrans->lat,'Latitude transform failed');
        $this->assertEquals($LatLng->lng,$LatLngTrans->lng,'Longitude transform failed');
    }

}

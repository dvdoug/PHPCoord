<?php

  namespace PHPCoord;

  require_once(__DIR__.'/../OSRef.php');
  require_once(__DIR__.'/../LatLng.php');
  require_once(__DIR__.'/../RefEll.php');
  require_once(__DIR__.'/../UTMRef.php');

  class UTMRefTest extends \PHPUnit_Framework_TestCase {
    
    public function testToString() {
      
      $UTMRef = new UTMRef(699489, 5713918, 'U', 30);
      $expected = "30U 699489 5713918";
      
      self::assertEquals($expected, $UTMRef->__toString());
    }
    
    public function testLatLng() {
    
      $UTMRef = new UTMRef(699489, 5713918, 'U', 30);
      $LatLng = $UTMRef->toLatLng();
    
      $expectedLat = 51.5410534766;
      $expectedLng = -0.123188320451;
       
      self::assertTrue(abs($expectedLat - $LatLng->lat) < 0.0000000001, 'Latitude not within tolerance');
      self::assertTrue(abs($expectedLng - $LatLng->lng) < 0.0000000001, 'Longitude not within tolerance');
    }
    
  }
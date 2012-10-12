<?php

  namespace PHPCoord;

  require_once('../OSRef.php');
  require_once('../LatLng.php');
  require_once('../RefEll.php');

  class TestOSRef extends \PHPUnit_Framework_TestCase {
    
    public function testToString() {
      
      $OSRef = new OSRef(530140, 184184);
      $expected = "(530140, 184184)";
      
      self::assertEquals($expected, $OSRef->__toString());
    }
    
    public function testLatLng() {
    
      $OSRef = new OSRef(530140, 184184);
      $LatLng = $OSRef->toLatLng();
      
      $expectedLat = 51.5410521304;
      $expectedLng = -0.123185788025;
    
      self::assertEquals($expectedLat, $LatLng->lat);
      self::assertEquals($expectedLng, $LatLng->lng);
    }
  }
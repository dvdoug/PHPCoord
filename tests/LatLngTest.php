<?php

  namespace PHPCoord;

  require_once(__DIR__.'/../OSRef.php');
  require_once(__DIR__.'/../LatLng.php');
  require_once(__DIR__.'/../RefEll.php');
  require_once(__DIR__.'/../UTMRef.php');

  class LatLngTest extends \PHPUnit_Framework_TestCase {
    
    public function testToString() {
      
      $LatLng = new LatLng(51.5410521304, -0.123185788025);
      $expected = "(51.5410521304, -0.123185788025)";
      
      self::assertEquals($expected, $LatLng->__toString());
    }
    
    public function testOSRef() {
    
      $LatLng = new LatLng(51.5410521304, -0.123185788025);
      $OSRef = $LatLng->toOSRef();
      
      $expected = "(530140, 184184)";
    
      self::assertEquals($expected, $OSRef->__toString());
    }
    
    public function testUTMRef() {
    
      $LatLng = new LatLng(51.5410521304, -0.123185788025);
      $UTMRef = $LatLng->toUTMRef();
    
      $expected = "30U 699489 5713918";
    
      self::assertEquals($expected, $UTMRef->__toString());
    }
  }
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
    
    public function testUTMRef() {
    
      $LatLng = new LatLng(51.54105, -0.12319);
      $LatLng->OSGB36ToWGS84();
      $UTMRef = $LatLng->toUTMRef();
    
      $expected = "30U 699375 5713970";
    
      self::assertEquals($expected, $UTMRef->__toString());
    }
  }
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
    
      $expected = "(51.5410534766, -0.123188320451)";
       
      self::assertEquals($expected, $LatLng->__toString());
    }
    
  }
<?php

  namespace PHPCoord;

  require_once(__DIR__.'/../OSRef.php');
  require_once(__DIR__.'/../LatLng.php');
  require_once(__DIR__.'/../RefEll.php');
  require_once(__DIR__.'/../UTMRef.php');

  class OSRefTest extends \PHPUnit_Framework_TestCase {
    
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
       
      self::assertTrue(abs($expectedLat - $LatLng->lat) < 0.0000000001, 'Latitude not within tolerance');
      self::assertTrue(abs($expectedLng - $LatLng->lng) < 0.0000000001, 'Longitude not within tolerance');
      
    }
    
    public function testToSixFigureString() {
    
      $OSRef = new OSRef(530140, 184184);
   
      $expected = 'TQ301842';
    
      self::assertEquals($expected, $OSRef->toSixFigureString());
    }
    
    public function testFromSixFigureString() {
    
      $OSRef = OSRef::getOSRefFromSixFigureReference('TQ301842');
      $expected = "(530100, 184200)";
    
      self::assertEquals($expected, $OSRef->__toString());
    }
    

  }
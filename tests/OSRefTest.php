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
      
      $expected = "(51.5410521304, -0.123185788025)";
         
      self::assertEquals($expected, $LatLng->__toString());
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
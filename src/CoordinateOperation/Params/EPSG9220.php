<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(-42.0, 'urn:ogc:def:uom:EPSG::9102'),
  'longitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(44.0, 'urn:ogc:def:uom:EPSG::9102'),
  'latitudeOf1stStandardParallel' => UnitOfMeasureFactory::makeUnit(-34.0, 'urn:ogc:def:uom:EPSG::9102'),
  'latitudeOf2ndStandardParallel' => UnitOfMeasureFactory::makeUnit(-50.0, 'urn:ogc:def:uom:EPSG::9102'),
  'eastingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(1200000.0, 'urn:ogc:def:uom:EPSG::9001'),
  'northingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(1300000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

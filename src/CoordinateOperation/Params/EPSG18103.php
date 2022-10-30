<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(44.0, 'urn:ogc:def:uom:EPSG::9102'),
  'longitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(3.0, 'urn:ogc:def:uom:EPSG::9102'),
  'latitudeOf1stStandardParallel' => UnitOfMeasureFactory::makeUnit(43.25, 'urn:ogc:def:uom:EPSG::9102'),
  'latitudeOf2ndStandardParallel' => UnitOfMeasureFactory::makeUnit(44.75, 'urn:ogc:def:uom:EPSG::9102'),
  'eastingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(1700000.0, 'urn:ogc:def:uom:EPSG::9001'),
  'northingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(3200000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

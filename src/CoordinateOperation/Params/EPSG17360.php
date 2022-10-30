<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(-37.0, 'urn:ogc:def:uom:EPSG::9102'),
  'longitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(145.0, 'urn:ogc:def:uom:EPSG::9102'),
  'latitudeOf1stStandardParallel' => UnitOfMeasureFactory::makeUnit(-36.0, 'urn:ogc:def:uom:EPSG::9102'),
  'latitudeOf2ndStandardParallel' => UnitOfMeasureFactory::makeUnit(-38.0, 'urn:ogc:def:uom:EPSG::9102'),
  'eastingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(2500000.0, 'urn:ogc:def:uom:EPSG::9001'),
  'northingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(4500000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

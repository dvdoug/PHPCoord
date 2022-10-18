<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(63.390675, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'longitudeOfFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(-91.52, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'latitudeOf1stStandardParallel' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(49.0, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'latitudeOf2ndStandardParallel' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(77.0, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'eastingAtFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(6200000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'northingAtFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(3000000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

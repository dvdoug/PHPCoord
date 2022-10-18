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
    'value' => UnitOfMeasureFactory::makeUnit(49.0, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'longitudeOfFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(3.0, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'latitudeOf1stStandardParallel' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(48.25, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'latitudeOf2ndStandardParallel' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(49.75, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'eastingAtFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(1700000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'northingAtFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(8200000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

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
    'value' => UnitOfMeasureFactory::makeUnit(57.310319415, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'longitudeOfFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(24.0, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'latitudeOf1stStandardParallel' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(59.2, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'latitudeOf2ndStandardParallel' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(58.0, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'eastingAtFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(500000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'northingAtFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(6375000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

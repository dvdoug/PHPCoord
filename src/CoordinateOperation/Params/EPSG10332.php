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
    'value' => UnitOfMeasureFactory::makeUnit(32.4, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'longitudeOfFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(-92.0, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'latitudeOf1stStandardParallel' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(34.46, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'latitudeOf2ndStandardParallel' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(33.18, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'eastingAtFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(400000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'northingAtFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(400000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

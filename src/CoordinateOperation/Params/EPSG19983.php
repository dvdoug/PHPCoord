<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfStandardParallel' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(-67.0, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'longitudeOfOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(140.0, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'eastingAtFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(300000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'northingAtFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(200000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

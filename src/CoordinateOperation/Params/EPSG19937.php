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
    'value' => UnitOfMeasureFactory::makeUnit(36.5964, 'urn:ogc:def:uom:EPSG::9105'),
  ],
  'longitudeOfFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(7.83445, 'urn:ogc:def:uom:EPSG::9105'),
  ],
  'eastingAtFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(270.0, 'urn:ogc:def:uom:EPSG::9036'),
  ],
  'northingAtFalseOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(360.0, 'urn:ogc:def:uom:EPSG::9036'),
  ],
];

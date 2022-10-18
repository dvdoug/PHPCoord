<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(46.570866, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'longitudeOfProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(7.26225, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'azimuthOfInitialLine' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(90.0, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'angleFromRectifiedToSkewGrid' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(90.0, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'scaleFactorOnInitialLine' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(1.0, 'urn:ogc:def:uom:EPSG::9201'),
  ],
  'eastingAtProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(2600000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'northingAtProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(1200000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

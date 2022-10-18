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
    'value' => UnitOfMeasureFactory::makeUnit(-21.0, 'urn:ogc:def:uom:EPSG::9105'),
  ],
  'longitudeOfProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(49.0, 'urn:ogc:def:uom:EPSG::9105'),
  ],
  'azimuthOfInitialLine' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(21.0, 'urn:ogc:def:uom:EPSG::9105'),
  ],
  'angleFromRectifiedToSkewGrid' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(21.0, 'urn:ogc:def:uom:EPSG::9105'),
  ],
  'scaleFactorOnInitialLine' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(0.9995, 'urn:ogc:def:uom:EPSG::9201'),
  ],
  'eastingAtProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(400000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'northingAtProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(800000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

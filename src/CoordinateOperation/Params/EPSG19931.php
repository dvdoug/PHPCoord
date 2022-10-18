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
    'value' => UnitOfMeasureFactory::makeUnit(47.08398174, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'longitudeOfProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(19.02548584, 'urn:ogc:def:uom:EPSG::9110'),
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
    'value' => UnitOfMeasureFactory::makeUnit(0.99993, 'urn:ogc:def:uom:EPSG::9201'),
  ],
  'eastingAtProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(650000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'northingAtProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(200000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

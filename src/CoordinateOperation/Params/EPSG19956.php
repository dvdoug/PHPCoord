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
    'value' => UnitOfMeasureFactory::makeUnit(4.0, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'longitudeOfProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(115.0, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'azimuthOfInitialLine' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(53.18569537, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'angleFromRectifiedToSkewGrid' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(53.07483685, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'scaleFactorOnInitialLine' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(0.99984, 'urn:ogc:def:uom:EPSG::9201'),
  ],
  'eastingAtProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(29352.4763, 'urn:ogc:def:uom:EPSG::9042'),
  ],
  'northingAtProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(22014.3572, 'urn:ogc:def:uom:EPSG::9042'),
  ],
];

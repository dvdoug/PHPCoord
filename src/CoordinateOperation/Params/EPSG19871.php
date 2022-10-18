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
    'value' => UnitOfMeasureFactory::makeUnit(102.15, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'azimuthOfInitialLine' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(323.01328458, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'angleFromRectifiedToSkewGrid' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(323.07483685, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'scaleFactorOnInitialLine' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(0.99984, 'urn:ogc:def:uom:EPSG::9201'),
  ],
  'falseEasting' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(40000.0, 'urn:ogc:def:uom:EPSG::9301'),
  ],
  'falseNorthing' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9301'),
  ],
];

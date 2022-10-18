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
    'value' => UnitOfMeasureFactory::makeUnit(45.1833, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'longitudeOfProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(-86.0, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'azimuthOfInitialLine' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(337.25556, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'angleFromRectifiedToSkewGrid' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(337.25556, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'scaleFactorOnInitialLine' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(0.9996, 'urn:ogc:def:uom:EPSG::9201'),
  ],
  'falseEasting' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(2546731.496, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'falseNorthing' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(-4354009.816, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

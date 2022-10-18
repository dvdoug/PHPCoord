<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.2, 'urn:ogc:def:uom:EPSG::1033'),
  ],
  'yAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.4, 'urn:ogc:def:uom:EPSG::1033'),
  ],
  'zAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(1.6, 'urn:ogc:def:uom:EPSG::1033'),
  ],
  'xAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
  ],
  'yAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
  ],
  'zAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
  ],
  'scaleDifference' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.3, 'urn:ogc:def:uom:EPSG::1028'),
  ],
];

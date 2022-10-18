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
    'value' => UnitOfMeasureFactory::makeUnit(-1.07, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'yAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.03, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'zAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.02, 'urn:ogc:def:uom:EPSG::9001'),
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
    'value' => UnitOfMeasureFactory::makeUnit(-130.0, 'urn:ogc:def:uom:EPSG::1031'),
  ],
  'scaleDifference' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.22, 'urn:ogc:def:uom:EPSG::9202'),
  ],
  'transformationReferenceEpoch' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(2002.0, 'urn:ogc:def:uom:EPSG::1029'),
  ],
];

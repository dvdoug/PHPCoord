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
    'value' => UnitOfMeasureFactory::makeUnit(0.908, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'yAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-2.0161, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'zAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.5653, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'xAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(28.971, 'urn:ogc:def:uom:EPSG::1031'),
  ],
  'yAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(10.42, 'urn:ogc:def:uom:EPSG::1031'),
  ],
  'zAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(8.928, 'urn:ogc:def:uom:EPSG::1031'),
  ],
  'scaleDifference' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(1.1, 'urn:ogc:def:uom:EPSG::1028'),
  ],
  'rateOfChangeOfXAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.0001, 'urn:ogc:def:uom:EPSG::1042'),
  ],
  'rateOfChangeOfYAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.0001, 'urn:ogc:def:uom:EPSG::1042'),
  ],
  'rateOfChangeOfZAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.0018, 'urn:ogc:def:uom:EPSG::1042'),
  ],
  'rateOfChangeOfXAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.02, 'urn:ogc:def:uom:EPSG::1032'),
  ],
  'rateOfChangeOfYAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.105, 'urn:ogc:def:uom:EPSG::1032'),
  ],
  'rateOfChangeOfZAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.347, 'urn:ogc:def:uom:EPSG::1032'),
  ],
  'rateOfChangeOfScaleDifference' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.08, 'urn:ogc:def:uom:EPSG::1030'),
  ],
  'parameterReferenceEpoch' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(1997.0, 'urn:ogc:def:uom:EPSG::1029'),
  ],
];

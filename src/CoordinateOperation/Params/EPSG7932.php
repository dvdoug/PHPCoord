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
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1033'),
  ],
  'yAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1033'),
  ],
  'zAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1033'),
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
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1028'),
  ],
  'rateOfChangeOfXAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1034'),
  ],
  'rateOfChangeOfYAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1034'),
  ],
  'rateOfChangeOfZAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1034'),
  ],
  'rateOfChangeOfXAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.11, 'urn:ogc:def:uom:EPSG::1032'),
  ],
  'rateOfChangeOfYAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.57, 'urn:ogc:def:uom:EPSG::1032'),
  ],
  'rateOfChangeOfZAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.71, 'urn:ogc:def:uom:EPSG::1032'),
  ],
  'rateOfChangeOfScaleDifference' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1030'),
  ],
  'parameterReferenceEpoch' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(1989.0, 'urn:ogc:def:uom:EPSG::1029'),
  ],
];

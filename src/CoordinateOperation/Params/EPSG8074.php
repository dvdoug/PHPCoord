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
    'value' => UnitOfMeasureFactory::makeUnit(50.4, 'urn:ogc:def:uom:EPSG::1025'),
  ],
  'yAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-3.3, 'urn:ogc:def:uom:EPSG::1025'),
  ],
  'zAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(60.2, 'urn:ogc:def:uom:EPSG::1025'),
  ],
  'xAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(2.81, 'urn:ogc:def:uom:EPSG::1031'),
  ],
  'yAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(3.38, 'urn:ogc:def:uom:EPSG::1031'),
  ],
  'zAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.4, 'urn:ogc:def:uom:EPSG::1031'),
  ],
  'scaleDifference' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-4.29, 'urn:ogc:def:uom:EPSG::1028'),
  ],
  'rateOfChangeOfXAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(2.8, 'urn:ogc:def:uom:EPSG::1027'),
  ],
  'rateOfChangeOfYAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.1, 'urn:ogc:def:uom:EPSG::1027'),
  ],
  'rateOfChangeOfZAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(2.5, 'urn:ogc:def:uom:EPSG::1027'),
  ],
  'rateOfChangeOfXAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.11, 'urn:ogc:def:uom:EPSG::1032'),
  ],
  'rateOfChangeOfYAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.19, 'urn:ogc:def:uom:EPSG::1032'),
  ],
  'rateOfChangeOfZAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.07, 'urn:ogc:def:uom:EPSG::1032'),
  ],
  'rateOfChangeOfScaleDifference' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.12, 'urn:ogc:def:uom:EPSG::1030'),
  ],
  'parameterReferenceEpoch' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(2010.0, 'urn:ogc:def:uom:EPSG::1029'),
  ],
];

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.9109, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-2.0129, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.5863, 'urn:ogc:def:uom:EPSG::9001'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(28.711, 'urn:ogc:def:uom:EPSG::1031'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(11.785, 'urn:ogc:def:uom:EPSG::1031'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(4.417, 'urn:ogc:def:uom:EPSG::1031'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(2.12, 'urn:ogc:def:uom:EPSG::1028'),
  'rateOfChangeOfXAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0001, 'urn:ogc:def:uom:EPSG::1042'),
  'rateOfChangeOfYAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0001, 'urn:ogc:def:uom:EPSG::1042'),
  'rateOfChangeOfZAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.0019, 'urn:ogc:def:uom:EPSG::1042'),
  'rateOfChangeOfXAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.02, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfYAxisRotation' => UnitOfMeasureFactory::makeUnit(0.105, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfZAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.347, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfScaleDifference' => UnitOfMeasureFactory::makeUnit(0.11, 'urn:ogc:def:uom:EPSG::1030'),
  'parameterReferenceEpoch' => UnitOfMeasureFactory::makeUnit(2010.0, 'urn:ogc:def:uom:EPSG::1029'),
];

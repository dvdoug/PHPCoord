<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.9956, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-1.9013, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.5215, 'urn:ogc:def:uom:EPSG::9001'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(25.915, 'urn:ogc:def:uom:EPSG::1031'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(9.426, 'urn:ogc:def:uom:EPSG::1031'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(11.599, 'urn:ogc:def:uom:EPSG::1031'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(0.62, 'urn:ogc:def:uom:EPSG::1028'),
  'rateOfChangeOfXAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0007, 'urn:ogc:def:uom:EPSG::1042'),
  'rateOfChangeOfYAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.0007, 'urn:ogc:def:uom:EPSG::1042'),
  'rateOfChangeOfZAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0005, 'urn:ogc:def:uom:EPSG::1042'),
  'rateOfChangeOfXAxisRotation' => UnitOfMeasureFactory::makeUnit(0.067, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfYAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.757, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfZAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.051, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfScaleDifference' => UnitOfMeasureFactory::makeUnit(-0.18, 'urn:ogc:def:uom:EPSG::1030'),
  'parameterReferenceEpoch' => UnitOfMeasureFactory::makeUnit(1997.0, 'urn:ogc:def:uom:EPSG::1029'),
];

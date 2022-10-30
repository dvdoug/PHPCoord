<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(1.5, 'urn:ogc:def:uom:EPSG::1025'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1025'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(5.8, 'urn:ogc:def:uom:EPSG::1025'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.012, 'urn:ogc:def:uom:EPSG::1031'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(0.014, 'urn:ogc:def:uom:EPSG::1031'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(0.014, 'urn:ogc:def:uom:EPSG::1031'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(-1.04, 'urn:ogc:def:uom:EPSG::1028'),
  'rateOfChangeOfXAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.1, 'urn:ogc:def:uom:EPSG::1027'),
  'rateOfChangeOfYAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1027'),
  'rateOfChangeOfZAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.1, 'urn:ogc:def:uom:EPSG::1027'),
  'rateOfChangeOfXAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.002, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfYAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.003, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfZAxisRotation' => UnitOfMeasureFactory::makeUnit(0.001, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfScaleDifference' => UnitOfMeasureFactory::makeUnit(0.01, 'urn:ogc:def:uom:EPSG::1030'),
  'parameterReferenceEpoch' => UnitOfMeasureFactory::makeUnit(2005.0, 'urn:ogc:def:uom:EPSG::1029'),
];

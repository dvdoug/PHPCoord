<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(1.0053, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-1.9092, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.5416, 'urn:ogc:def:uom:EPSG::9001'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-26.7814, 'urn:ogc:def:uom:EPSG::1031'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(0.4203, 'urn:ogc:def:uom:EPSG::1031'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-10.9321, 'urn:ogc:def:uom:EPSG::1031'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(0.37, 'urn:ogc:def:uom:EPSG::1028'),
  'rateOfChangeOfXAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0008, 'urn:ogc:def:uom:EPSG::1042'),
  'rateOfChangeOfYAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.0006, 'urn:ogc:def:uom:EPSG::1042'),
  'rateOfChangeOfZAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.0014, 'urn:ogc:def:uom:EPSG::1042'),
  'rateOfChangeOfXAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.0667, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfYAxisRotation' => UnitOfMeasureFactory::makeUnit(0.7574, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfZAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0513, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfScaleDifference' => UnitOfMeasureFactory::makeUnit(-0.07, 'urn:ogc:def:uom:EPSG::1030'),
  'parameterReferenceEpoch' => UnitOfMeasureFactory::makeUnit(2010.0, 'urn:ogc:def:uom:EPSG::1029'),
];

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-79.73, 'urn:ogc:def:uom:EPSG::1025'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-6.86, 'urn:ogc:def:uom:EPSG::1025'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(38.03, 'urn:ogc:def:uom:EPSG::1025'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.0351, 'urn:ogc:def:uom:EPSG::1031'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(2.1211, 'urn:ogc:def:uom:EPSG::1031'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(2.1411, 'urn:ogc:def:uom:EPSG::1031'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(6.636, 'urn:ogc:def:uom:EPSG::1028'),
  'rateOfChangeOfXAxisTranslation' => UnitOfMeasureFactory::makeUnit(2.25, 'urn:ogc:def:uom:EPSG::1027'),
  'rateOfChangeOfYAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.62, 'urn:ogc:def:uom:EPSG::1027'),
  'rateOfChangeOfZAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.56, 'urn:ogc:def:uom:EPSG::1027'),
  'rateOfChangeOfXAxisRotation' => UnitOfMeasureFactory::makeUnit(1.4707, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfYAxisRotation' => UnitOfMeasureFactory::makeUnit(1.1443, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfZAxisRotation' => UnitOfMeasureFactory::makeUnit(1.1701, 'urn:ogc:def:uom:EPSG::1032'),
  'rateOfChangeOfScaleDifference' => UnitOfMeasureFactory::makeUnit(0.294, 'urn:ogc:def:uom:EPSG::1030'),
  'parameterReferenceEpoch' => UnitOfMeasureFactory::makeUnit(1994.0, 'urn:ogc:def:uom:EPSG::1029'),
];

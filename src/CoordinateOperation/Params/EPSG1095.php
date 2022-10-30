<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-270.933, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(115.599, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-360.226, 'urn:ogc:def:uom:EPSG::9001'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-5.266, 'urn:ogc:def:uom:EPSG::9104'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-1.238, 'urn:ogc:def:uom:EPSG::9104'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(2.381, 'urn:ogc:def:uom:EPSG::9104'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(-5.109, 'urn:ogc:def:uom:EPSG::9202'),
  'ordinate1OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(2464351.59, 'urn:ogc:def:uom:EPSG::9001'),
  'ordinate2OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(-5783466.61, 'urn:ogc:def:uom:EPSG::9001'),
  'ordinate3OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(974809.81, 'urn:ogc:def:uom:EPSG::9001'),
];

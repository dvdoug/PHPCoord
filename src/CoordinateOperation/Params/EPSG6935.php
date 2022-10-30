<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.208, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.012, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.229, 'urn:ogc:def:uom:EPSG::9001'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.01182, 'urn:ogc:def:uom:EPSG::9104'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(0.00811, 'urn:ogc:def:uom:EPSG::9104'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.01677, 'urn:ogc:def:uom:EPSG::9104'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(-0.0059, 'urn:ogc:def:uom:EPSG::9202'),
  'ordinate1OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(3777505.028, 'urn:ogc:def:uom:EPSG::9001'),
  'ordinate2OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(3779254.396, 'urn:ogc:def:uom:EPSG::9001'),
  'ordinate3OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(3471111.632, 'urn:ogc:def:uom:EPSG::9001'),
];

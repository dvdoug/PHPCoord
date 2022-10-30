<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(5.0, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-133.0, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-104.0, 'urn:ogc:def:uom:EPSG::9001'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-1.4, 'urn:ogc:def:uom:EPSG::9104'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-2.0, 'urn:ogc:def:uom:EPSG::9104'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(3.4, 'urn:ogc:def:uom:EPSG::9104'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(-3.9901, 'urn:ogc:def:uom:EPSG::9202'),
  'ordinate1OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(4223032.0, 'urn:ogc:def:uom:EPSG::9001'),
  'ordinate2OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(2032778.0, 'urn:ogc:def:uom:EPSG::9001'),
  'ordinate3OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(4309209.0, 'urn:ogc:def:uom:EPSG::9001'),
];

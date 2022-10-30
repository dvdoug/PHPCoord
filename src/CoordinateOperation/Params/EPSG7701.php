<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'ordinate1OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(56.58, 'urn:ogc:def:uom:EPSG::9110'),
  'ordinate2OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(24.53, 'urn:ogc:def:uom:EPSG::9110'),
  'verticalOffset' => UnitOfMeasureFactory::makeUnit(0.003, 'urn:ogc:def:uom:EPSG::9001'),
  'inclinationInLatitude' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9104'),
  'inclinationInLongitude' => UnitOfMeasureFactory::makeUnit(0.0074, 'urn:ogc:def:uom:EPSG::9104'),
  'EPSGCodeForHorizontalCRS' => 'urn:ogc:def:crs:EPSG::4258',
];

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'ordinate1OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(50.43, 'urn:ogc:def:uom:EPSG::9110'),
  'ordinate2OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(4.46, 'urn:ogc:def:uom:EPSG::9110'),
  'verticalOffset' => UnitOfMeasureFactory::makeUnit(-2.311, 'urn:ogc:def:uom:EPSG::9001'),
  'inclinationInLatitude' => UnitOfMeasureFactory::makeUnit(-0.016, 'urn:ogc:def:uom:EPSG::9104'),
  'inclinationInLongitude' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9104'),
  'EPSGCodeForHorizontalCRS' => 'urn:ogc:def:crs:EPSG::4258',
];

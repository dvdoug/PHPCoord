<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'ordinate1OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(46.0, 'urn:ogc:def:uom:EPSG::9102'),
  'ordinate2OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(15.0, 'urn:ogc:def:uom:EPSG::9102'),
  'verticalOffset' => UnitOfMeasureFactory::makeUnit(-0.411, 'urn:ogc:def:uom:EPSG::9001'),
  'inclinationInLatitude' => UnitOfMeasureFactory::makeUnit(-0.033, 'urn:ogc:def:uom:EPSG::9104'),
  'inclinationInLongitude' => UnitOfMeasureFactory::makeUnit(0.008, 'urn:ogc:def:uom:EPSG::9104'),
  'EPSGCodeForHorizontalCRS' => 'urn:ogc:def:crs:EPSG::4258',
];

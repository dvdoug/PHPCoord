<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'ordinate1OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(42.373, 'urn:ogc:def:uom:EPSG::9110'),
  'ordinate2OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(25.2236, 'urn:ogc:def:uom:EPSG::9110'),
  'verticalOffset' => UnitOfMeasureFactory::makeUnit(0.228, 'urn:ogc:def:uom:EPSG::9001'),
  'inclinationInLatitude' => UnitOfMeasureFactory::makeUnit(-0.009, 'urn:ogc:def:uom:EPSG::9104'),
  'inclinationInLongitude' => UnitOfMeasureFactory::makeUnit(-0.003, 'urn:ogc:def:uom:EPSG::9104'),
  'EPSGCodeForHorizontalCRS' => 'urn:ogc:def:crs:EPSG::4258',
];

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'ordinate1OfEvaluationPoint' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(46.0, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'ordinate2OfEvaluationPoint' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(15.0, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'verticalOffset' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.411, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'inclinationInLatitude' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.033, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'inclinationInLongitude' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.008, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'EPSGCodeForHorizontalCRS' => [
    'reverses' => false,
    'value' => 'urn:ogc:def:crs:EPSG::4258',
  ],
];

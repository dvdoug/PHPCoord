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
    'value' => UnitOfMeasureFactory::makeUnit(56.58, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'ordinate2OfEvaluationPoint' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(24.53, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'verticalOffset' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.154, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'inclinationInLatitude' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.016, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'inclinationInLongitude' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.012, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'EPSGCodeForHorizontalCRS' => [
    'reverses' => false,
    'value' => 'urn:ogc:def:crs:EPSG::4258',
  ],
];

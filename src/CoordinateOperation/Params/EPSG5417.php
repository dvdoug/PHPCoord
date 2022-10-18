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
    'value' => UnitOfMeasureFactory::makeUnit(56.02, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'ordinate2OfEvaluationPoint' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(9.14, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'verticalOffset' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.011, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'inclinationInLatitude' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.003, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'inclinationInLongitude' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.011, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'EPSGCodeForHorizontalCRS' => [
    'reverses' => false,
    'value' => 'urn:ogc:def:crs:EPSG::4258',
  ],
];

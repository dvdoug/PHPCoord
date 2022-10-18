<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-145.907, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'yAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(505.034, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'zAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(685.756, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'xAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-1.162, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'yAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(2.347, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'zAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(1.592, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'scaleDifference' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(6.342, 'urn:ogc:def:uom:EPSG::9202'),
  ],
  'ordinate1OfEvaluationPoint' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(-3159521.31, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'ordinate2OfEvaluationPoint' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(4068151.32, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'ordinate3OfEvaluationPoint' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(3748113.85, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

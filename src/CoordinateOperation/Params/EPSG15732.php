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
    'value' => UnitOfMeasureFactory::makeUnit(311.118, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'yAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(289.167, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'zAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-310.641, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'xAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-8.358815E-5, 'urn:ogc:def:uom:EPSG::9101'),
  ],
  'yAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-3.057474E-5, 'urn:ogc:def:uom:EPSG::9101'),
  ],
  'zAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(7.573043E-6, 'urn:ogc:def:uom:EPSG::9101'),
  ],
  'scaleDifference' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-5.771882, 'urn:ogc:def:uom:EPSG::9202'),
  ],
  'ordinate1OfEvaluationPoint' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(1555622.801, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'ordinate2OfEvaluationPoint' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(-6105353.313, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'ordinate3OfEvaluationPoint' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(991255.656, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

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
    'value' => UnitOfMeasureFactory::makeUnit(-250.7, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'yAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-157.9, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'zAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(380.4, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

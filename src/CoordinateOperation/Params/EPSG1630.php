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
    'value' => UnitOfMeasureFactory::makeUnit(-181.5, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'yAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-90.3, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'zAxisTranslation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-187.2, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'xAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.144, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'yAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(0.492, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'zAxisRotation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-0.394, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'scaleDifference' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(17.57, 'urn:ogc:def:uom:EPSG::9202'),
  ],
];

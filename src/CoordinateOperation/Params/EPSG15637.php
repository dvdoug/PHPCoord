<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOffset' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(10.8, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'longitudeOffset' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-11.53, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'geoidUndulation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(39.7, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

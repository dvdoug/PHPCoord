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
    'value' => UnitOfMeasureFactory::makeUnit(10.33, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'longitudeOffset' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-12.27, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'geoidUndulation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(40.1, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

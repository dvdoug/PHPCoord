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
    'value' => UnitOfMeasureFactory::makeUnit(11.9, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'longitudeOffset' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-11.47, 'urn:ogc:def:uom:EPSG::9104'),
  ],
  'geoidUndulation' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(36.9, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

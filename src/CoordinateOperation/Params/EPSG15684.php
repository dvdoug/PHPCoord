<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOffset' => UnitOfMeasureFactory::makeUnit(12.1, 'urn:ogc:def:uom:EPSG::9104'),
  'longitudeOffset' => UnitOfMeasureFactory::makeUnit(-10.08, 'urn:ogc:def:uom:EPSG::9104'),
  'geoidUndulation' => UnitOfMeasureFactory::makeUnit(37.3, 'urn:ogc:def:uom:EPSG::9001'),
];

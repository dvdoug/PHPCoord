<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOffset' => UnitOfMeasureFactory::makeUnit(11.9, 'urn:ogc:def:uom:EPSG::9104'),
  'longitudeOffset' => UnitOfMeasureFactory::makeUnit(-10.7, 'urn:ogc:def:uom:EPSG::9104'),
  'geoidUndulation' => UnitOfMeasureFactory::makeUnit(39.3, 'urn:ogc:def:uom:EPSG::9001'),
];

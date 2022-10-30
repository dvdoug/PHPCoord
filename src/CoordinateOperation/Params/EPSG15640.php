<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOffset' => UnitOfMeasureFactory::makeUnit(11.0, 'urn:ogc:def:uom:EPSG::9104'),
  'longitudeOffset' => UnitOfMeasureFactory::makeUnit(-12.25, 'urn:ogc:def:uom:EPSG::9104'),
  'geoidUndulation' => UnitOfMeasureFactory::makeUnit(41.2, 'urn:ogc:def:uom:EPSG::9001'),
];

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOffset' => UnitOfMeasureFactory::makeUnit(9.55, 'urn:ogc:def:uom:EPSG::9104'),
  'longitudeOffset' => UnitOfMeasureFactory::makeUnit(-12.63, 'urn:ogc:def:uom:EPSG::9104'),
  'geoidUndulation' => UnitOfMeasureFactory::makeUnit(35.6, 'urn:ogc:def:uom:EPSG::9001'),
];

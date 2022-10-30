<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOffset' => UnitOfMeasureFactory::makeUnit(11.72, 'urn:ogc:def:uom:EPSG::9104'),
  'longitudeOffset' => UnitOfMeasureFactory::makeUnit(-9.48, 'urn:ogc:def:uom:EPSG::9104'),
  'geoidUndulation' => UnitOfMeasureFactory::makeUnit(35.1, 'urn:ogc:def:uom:EPSG::9001'),
];

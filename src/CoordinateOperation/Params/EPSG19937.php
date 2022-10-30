<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(36.5964, 'urn:ogc:def:uom:EPSG::9105'),
  'longitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(7.83445, 'urn:ogc:def:uom:EPSG::9105'),
  'eastingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(270.0, 'urn:ogc:def:uom:EPSG::9036'),
  'northingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(360.0, 'urn:ogc:def:uom:EPSG::9036'),
];

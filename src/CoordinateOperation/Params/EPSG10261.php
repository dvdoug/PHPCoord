<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(56.0, 'urn:ogc:def:uom:EPSG::9102'),
  'scaleFactorAtNaturalOrigin' => UnitOfMeasureFactory::makeUnit(1.0, 'urn:ogc:def:uom:EPSG::9201'),
  'latitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(55.0, 'urn:ogc:def:uom:EPSG::9102'),
  'longitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(14.92775, 'urn:ogc:def:uom:EPSG::9102'),
  'eastingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(-18831.46, 'urn:ogc:def:uom:EPSG::9001'),
  'northingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(5614.621, 'urn:ogc:def:uom:EPSG::9001'),
];

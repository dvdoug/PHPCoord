<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(25.3, 'urn:ogc:def:uom:EPSG::9110'),
  'longitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(-91.2, 'urn:ogc:def:uom:EPSG::9110'),
  'latitudeOf1stStandardParallel' => UnitOfMeasureFactory::makeUnit(27.5, 'urn:ogc:def:uom:EPSG::9110'),
  'latitudeOf2ndStandardParallel' => UnitOfMeasureFactory::makeUnit(26.1, 'urn:ogc:def:uom:EPSG::9110'),
  'eastingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(3280833.3333, 'urn:ogc:def:uom:EPSG::9003'),
  'northingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9003'),
];

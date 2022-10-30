<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(36.2, 'urn:ogc:def:uom:EPSG::9110'),
  'longitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(-78.3, 'urn:ogc:def:uom:EPSG::9110'),
  'latitudeOf1stStandardParallel' => UnitOfMeasureFactory::makeUnit(37.58, 'urn:ogc:def:uom:EPSG::9110'),
  'latitudeOf2ndStandardParallel' => UnitOfMeasureFactory::makeUnit(36.46, 'urn:ogc:def:uom:EPSG::9110'),
  'eastingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(11482916.667, 'urn:ogc:def:uom:EPSG::9003'),
  'northingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(3280833.333, 'urn:ogc:def:uom:EPSG::9003'),
];

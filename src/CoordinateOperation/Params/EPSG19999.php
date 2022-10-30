<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(49.225, 'urn:ogc:def:uom:EPSG::9102'),
  'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(-2.135, 'urn:ogc:def:uom:EPSG::9102'),
  'scaleFactorAtNaturalOrigin' => UnitOfMeasureFactory::makeUnit(0.9999999, 'urn:ogc:def:uom:EPSG::9201'),
  'falseEasting' => UnitOfMeasureFactory::makeUnit(40000.0, 'urn:ogc:def:uom:EPSG::9001'),
  'falseNorthing' => UnitOfMeasureFactory::makeUnit(70000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9102'),
  'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(-54.0, 'urn:ogc:def:uom:EPSG::9102'),
  'falseEasting' => UnitOfMeasureFactory::makeUnit(5000000.0, 'urn:ogc:def:uom:EPSG::9001'),
  'falseNorthing' => UnitOfMeasureFactory::makeUnit(10000000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

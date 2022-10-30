<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfStandardParallel' => UnitOfMeasureFactory::makeUnit(-80.1419, 'urn:ogc:def:uom:EPSG::9110'),
  'longitudeOfOrigin' => UnitOfMeasureFactory::makeUnit(-75.0, 'urn:ogc:def:uom:EPSG::9102'),
  'falseEasting' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9001'),
  'falseNorthing' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9001'),
];

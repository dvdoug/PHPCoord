<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(46.58507947, 'urn:ogc:def:uom:EPSG::9110'),
  'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(11.31425775, 'urn:ogc:def:uom:EPSG::9110'),
  'scaleFactorAtNaturalOrigin' => UnitOfMeasureFactory::makeUnit(1.000121, 'urn:ogc:def:uom:EPSG::9201'),
  'falseEasting' => UnitOfMeasureFactory::makeUnit(20000.0, 'urn:ogc:def:uom:EPSG::9001'),
  'falseNorthing' => UnitOfMeasureFactory::makeUnit(100000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

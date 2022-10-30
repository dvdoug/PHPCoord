<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(54.0, 'urn:ogc:def:uom:EPSG::9102'),
  'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(-162.0, 'urn:ogc:def:uom:EPSG::9102'),
  'scaleFactorAtNaturalOrigin' => UnitOfMeasureFactory::makeUnit(0.9999, 'urn:ogc:def:uom:EPSG::9201'),
  'falseEasting' => UnitOfMeasureFactory::makeUnit(700000.0, 'urn:ogc:def:uom:EPSG::9003'),
  'falseNorthing' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9003'),
];

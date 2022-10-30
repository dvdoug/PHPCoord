<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(5.320310106, 'urn:ogc:def:uom:EPSG::9110'),
  'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(-73.210698004, 'urn:ogc:def:uom:EPSG::9110'),
  'falseEasting' => UnitOfMeasureFactory::makeUnit(1080514.91, 'urn:ogc:def:uom:EPSG::9001'),
  'falseNorthing' => UnitOfMeasureFactory::makeUnit(1103772.028, 'urn:ogc:def:uom:EPSG::9001'),
  'projectionPlaneOriginHeight' => UnitOfMeasureFactory::makeUnit(2800.0, 'urn:ogc:def:uom:EPSG::9001'),
];

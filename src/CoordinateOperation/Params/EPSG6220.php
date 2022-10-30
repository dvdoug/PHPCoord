<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(1.371564426, 'urn:ogc:def:uom:EPSG::9110'),
  'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(-75.370882337, 'urn:ogc:def:uom:EPSG::9110'),
  'falseEasting' => UnitOfMeasureFactory::makeUnit(1162300.348, 'urn:ogc:def:uom:EPSG::9001'),
  'falseNorthing' => UnitOfMeasureFactory::makeUnit(671068.716, 'urn:ogc:def:uom:EPSG::9001'),
  'projectionPlaneOriginHeight' => UnitOfMeasureFactory::makeUnit(300.0, 'urn:ogc:def:uom:EPSG::9001'),
];

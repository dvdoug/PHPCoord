<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(46.570866, 'urn:ogc:def:uom:EPSG::9110'),
  'longitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(7.26225, 'urn:ogc:def:uom:EPSG::9110'),
  'azimuthOfInitialLine' => UnitOfMeasureFactory::makeUnit(90.0, 'urn:ogc:def:uom:EPSG::9110'),
  'angleFromRectifiedToSkewGrid' => UnitOfMeasureFactory::makeUnit(90.0, 'urn:ogc:def:uom:EPSG::9110'),
  'scaleFactorOnInitialLine' => UnitOfMeasureFactory::makeUnit(1.0, 'urn:ogc:def:uom:EPSG::9201'),
  'eastingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9001'),
  'northingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9001'),
];

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(57.0, 'urn:ogc:def:uom:EPSG::9110'),
  'longitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(-133.4, 'urn:ogc:def:uom:EPSG::9110'),
  'azimuthOfInitialLine' => UnitOfMeasureFactory::makeUnit(323.07483685, 'urn:ogc:def:uom:EPSG::9110'),
  'angleFromRectifiedToSkewGrid' => UnitOfMeasureFactory::makeUnit(323.07483685, 'urn:ogc:def:uom:EPSG::9110'),
  'scaleFactorOnInitialLine' => UnitOfMeasureFactory::makeUnit(0.9999, 'urn:ogc:def:uom:EPSG::9201'),
  'falseEasting' => UnitOfMeasureFactory::makeUnit(5000000.0, 'urn:ogc:def:uom:EPSG::9001'),
  'falseNorthing' => UnitOfMeasureFactory::makeUnit(-5000000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(44.45, 'urn:ogc:def:uom:EPSG::9110'),
  'longitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(-124.03, 'urn:ogc:def:uom:EPSG::9110'),
  'azimuthOfInitialLine' => UnitOfMeasureFactory::makeUnit(5.0, 'urn:ogc:def:uom:EPSG::9102'),
  'angleFromRectifiedToSkewGrid' => UnitOfMeasureFactory::makeUnit(5.0, 'urn:ogc:def:uom:EPSG::9102'),
  'scaleFactorOnInitialLine' => UnitOfMeasureFactory::makeUnit(1.0, 'urn:ogc:def:uom:EPSG::9201'),
  'falseEasting' => UnitOfMeasureFactory::makeUnit(-984251.9685, 'urn:ogc:def:uom:EPSG::9002'),
  'falseNorthing' => UnitOfMeasureFactory::makeUnit(-15091863.5171, 'urn:ogc:def:uom:EPSG::9002'),
];

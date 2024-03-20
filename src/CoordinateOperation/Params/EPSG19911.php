<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(-21.0, 'urn:ogc:def:uom:EPSG::9105'),
    'longitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(49.0, 'urn:ogc:def:uom:EPSG::9105'),
    'azimuthOfInitialLine' => UnitOfMeasureFactory::makeUnit(21.0, 'urn:ogc:def:uom:EPSG::9105'),
    'angleFromRectifiedToSkewGrid' => UnitOfMeasureFactory::makeUnit(21.0, 'urn:ogc:def:uom:EPSG::9105'),
    'scaleFactorOnInitialLine' => UnitOfMeasureFactory::makeUnit(0.9995, 'urn:ogc:def:uom:EPSG::9201'),
    'eastingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(400000.0, 'urn:ogc:def:uom:EPSG::9001'),
    'northingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(800000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

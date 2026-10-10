<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(29.3, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(-83.3, 'urn:ogc:def:uom:EPSG::9110'),
    'azimuthAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(-40.0, 'urn:ogc:def:uom:EPSG::9110'),
    'angleFromRectifiedToSkewGrid' => UnitOfMeasureFactory::makeUnit(-40.0, 'urn:ogc:def:uom:EPSG::9110'),
    'scaleFactorAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(0.9997, 'urn:ogc:def:uom:EPSG::9201'),
    'eastingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(1676400.0, 'urn:ogc:def:uom:EPSG::9001'),
    'northingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(990600.0, 'urn:ogc:def:uom:EPSG::9001'),
];

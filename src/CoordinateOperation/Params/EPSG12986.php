<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(40.18, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(-74.3, 'urn:ogc:def:uom:EPSG::9110'),
    'azimuthAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(20.0, 'urn:ogc:def:uom:EPSG::9110'),
    'angleFromRectifiedToSkewGrid' => UnitOfMeasureFactory::makeUnit(20.0, 'urn:ogc:def:uom:EPSG::9110'),
    'scaleFactorAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(0.99999, 'urn:ogc:def:uom:EPSG::9201'),
    'eastingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(1750000.0, 'urn:ogc:def:uom:EPSG::9002'),
    'northingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(1000000.0, 'urn:ogc:def:uom:EPSG::9002'),
];

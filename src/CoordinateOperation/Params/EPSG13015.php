<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(40.4, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(-74.0, 'urn:ogc:def:uom:EPSG::9110'),
    'azimuthAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(75.0, 'urn:ogc:def:uom:EPSG::9110'),
    'angleFromRectifiedToSkewGrid' => UnitOfMeasureFactory::makeUnit(75.0, 'urn:ogc:def:uom:EPSG::9110'),
    'scaleFactorAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(0.999997, 'urn:ogc:def:uom:EPSG::9201'),
    'eastingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(304800.0, 'urn:ogc:def:uom:EPSG::9001'),
    'northingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(152400.0, 'urn:ogc:def:uom:EPSG::9001'),
];

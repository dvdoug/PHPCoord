<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(48.24, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(-114.27, 'urn:ogc:def:uom:EPSG::9110'),
    'azimuthAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(320.0, 'urn:ogc:def:uom:EPSG::9102'),
    'angleFromRectifiedToSkewGrid' => UnitOfMeasureFactory::makeUnit(-40.0, 'urn:ogc:def:uom:EPSG::9102'),
    'scaleFactorAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(1.000142, 'urn:ogc:def:uom:EPSG::9201'),
    'eastingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(150000.0, 'urn:ogc:def:uom:EPSG::9001'),
    'northingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(150000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

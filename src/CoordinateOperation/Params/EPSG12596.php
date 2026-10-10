<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(45.0, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(-86.0, 'urn:ogc:def:uom:EPSG::9110'),
    'azimuthAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(-26.0, 'urn:ogc:def:uom:EPSG::9110'),
    'angleFromRectifiedToSkewGrid' => UnitOfMeasureFactory::makeUnit(-26.0, 'urn:ogc:def:uom:EPSG::9110'),
    'scaleFactorAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(0.9998, 'urn:ogc:def:uom:EPSG::9201'),
    'eastingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(5000000.0, 'urn:ogc:def:uom:EPSG::9002'),
    'northingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(2500000.0, 'urn:ogc:def:uom:EPSG::9002'),
];

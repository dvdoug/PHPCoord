<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(20.54, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(-157.3, 'urn:ogc:def:uom:EPSG::9110'),
    'azimuthAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(-56.0, 'urn:ogc:def:uom:EPSG::9110'),
    'angleFromRectifiedToSkewGrid' => UnitOfMeasureFactory::makeUnit(-56.0, 'urn:ogc:def:uom:EPSG::9110'),
    'scaleFactorAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(1.00001, 'urn:ogc:def:uom:EPSG::9201'),
    'eastingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(838200.0, 'urn:ogc:def:uom:EPSG::9001'),
    'northingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(381000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

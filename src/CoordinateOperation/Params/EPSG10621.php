<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(37.6289686531, 'urn:ogc:def:uom:EPSG::9102'),
    'longitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(-122.3939412704, 'urn:ogc:def:uom:EPSG::9102'),
    'azimuthAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(27.7928209333, 'urn:ogc:def:uom:EPSG::9102'),
    'scaleFactorAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(0.9999968, 'urn:ogc:def:uom:EPSG::9201'),
    'eastingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9003'),
    'northingAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9003'),
];

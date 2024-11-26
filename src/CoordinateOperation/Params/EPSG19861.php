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
    'azimuthAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(21.0, 'urn:ogc:def:uom:EPSG::9105'),
    'scaleFactorAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(0.9995, 'urn:ogc:def:uom:EPSG::9201'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(400000.0, 'urn:ogc:def:uom:EPSG::9001'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(800000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

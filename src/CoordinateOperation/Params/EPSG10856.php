<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(-12.0, 'urn:ogc:def:uom:EPSG::9102'),
    'longitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(-54.0, 'urn:ogc:def:uom:EPSG::9102'),
    'latitudeOf1stStandardParallel' => UnitOfMeasureFactory::makeUnit(-2.0, 'urn:ogc:def:uom:EPSG::9102'),
    'latitudeOf2ndStandardParallel' => UnitOfMeasureFactory::makeUnit(-22.0, 'urn:ogc:def:uom:EPSG::9102'),
    'eastingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(5000000.0, 'urn:ogc:def:uom:EPSG::9001'),
    'northingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(10000000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

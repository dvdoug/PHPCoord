<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(-33.25, 'urn:ogc:def:uom:EPSG::9102'),
    'longitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(147.0, 'urn:ogc:def:uom:EPSG::9102'),
    'latitudeOf1stStandardParallel' => UnitOfMeasureFactory::makeUnit(-30.75, 'urn:ogc:def:uom:EPSG::9102'),
    'latitudeOf2ndStandardParallel' => UnitOfMeasureFactory::makeUnit(-35.75, 'urn:ogc:def:uom:EPSG::9102'),
    'eastingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(9300000.0, 'urn:ogc:def:uom:EPSG::9001'),
    'northingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(4500000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

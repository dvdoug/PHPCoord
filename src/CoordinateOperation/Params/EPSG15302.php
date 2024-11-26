<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(34.4, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(-86.0, 'urn:ogc:def:uom:EPSG::9110'),
    'latitudeOf1stStandardParallel' => UnitOfMeasureFactory::makeUnit(35.15, 'urn:ogc:def:uom:EPSG::9110'),
    'latitudeOf2ndStandardParallel' => UnitOfMeasureFactory::makeUnit(36.25, 'urn:ogc:def:uom:EPSG::9110'),
    'eastingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(2000000.0, 'urn:ogc:def:uom:EPSG::9003'),
    'northingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(100000.0, 'urn:ogc:def:uom:EPSG::9003'),
];

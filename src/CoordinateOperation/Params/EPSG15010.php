<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(51.0, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(-176.0, 'urn:ogc:def:uom:EPSG::9110'),
    'latitudeOf1stStandardParallel' => UnitOfMeasureFactory::makeUnit(53.5, 'urn:ogc:def:uom:EPSG::9110'),
    'latitudeOf2ndStandardParallel' => UnitOfMeasureFactory::makeUnit(51.5, 'urn:ogc:def:uom:EPSG::9110'),
    'eastingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(3000000.0, 'urn:ogc:def:uom:EPSG::9003'),
    'northingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9003'),
];

<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(25.63452135, 'urn:ogc:def:uom:EPSG::9102'),
    'longitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(93.5, 'urn:ogc:def:uom:EPSG::9102'),
    'latitudeOf1stStandardParallel' => UnitOfMeasureFactory::makeUnit(23.023, 'urn:ogc:def:uom:EPSG::9110'),
    'latitudeOf2ndStandardParallel' => UnitOfMeasureFactory::makeUnit(28.123, 'urn:ogc:def:uom:EPSG::9110'),
    'eastingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(1000000.0, 'urn:ogc:def:uom:EPSG::9001'),
    'northingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(1000000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

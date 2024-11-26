<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(-41.0, 'urn:ogc:def:uom:EPSG::9102'),
    'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(173.0, 'urn:ogc:def:uom:EPSG::9102'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(2510000.0, 'urn:ogc:def:uom:EPSG::9001'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(6023150.0, 'urn:ogc:def:uom:EPSG::9001'),
];

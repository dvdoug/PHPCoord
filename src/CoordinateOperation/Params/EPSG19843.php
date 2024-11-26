<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOf1stStandardParallel' => UnitOfMeasureFactory::makeUnit(-41.0, 'urn:ogc:def:uom:EPSG::9102'),
    'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(100.0, 'urn:ogc:def:uom:EPSG::9102'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9001'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9001'),
];

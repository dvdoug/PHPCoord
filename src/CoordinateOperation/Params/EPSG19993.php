<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfStandardParallel' => UnitOfMeasureFactory::makeUnit(-71.0, 'urn:ogc:def:uom:EPSG::9102'),
    'longitudeOfOrigin' => UnitOfMeasureFactory::makeUnit(70.0, 'urn:ogc:def:uom:EPSG::9102'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(6000000.0, 'urn:ogc:def:uom:EPSG::9001'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(6000000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

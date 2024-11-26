<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(45.0, 'urn:ogc:def:uom:EPSG::9102'),
    'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(-118.0, 'urn:ogc:def:uom:EPSG::9102'),
    'scaleFactorAtNaturalOrigin' => UnitOfMeasureFactory::makeUnit(1.00013, 'urn:ogc:def:uom:EPSG::9201'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(131233.5958, 'urn:ogc:def:uom:EPSG::9002'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9002'),
];

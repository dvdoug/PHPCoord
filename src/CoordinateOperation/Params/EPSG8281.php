<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(41.45, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(-118.25, 'urn:ogc:def:uom:EPSG::9110'),
    'scaleFactorAtNaturalOrigin' => UnitOfMeasureFactory::makeUnit(1.00019, 'urn:ogc:def:uom:EPSG::9201'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(80000.0, 'urn:ogc:def:uom:EPSG::9001'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9001'),
];

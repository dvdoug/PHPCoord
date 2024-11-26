<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(19.0, 'urn:ogc:def:uom:EPSG::9102'),
    'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(80.0, 'urn:ogc:def:uom:EPSG::9102'),
    'scaleFactorAtNaturalOrigin' => UnitOfMeasureFactory::makeUnit(0.99878641, 'urn:ogc:def:uom:EPSG::9201'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(3000000.0, 'urn:ogc:def:uom:EPSG::9084'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(1000000.0, 'urn:ogc:def:uom:EPSG::9084'),
];

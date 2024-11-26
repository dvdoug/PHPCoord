<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(53.35, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(17.003, 'urn:ogc:def:uom:EPSG::9110'),
    'scaleFactorAtNaturalOrigin' => UnitOfMeasureFactory::makeUnit(0.9998, 'urn:ogc:def:uom:EPSG::9201'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(3501000.0, 'urn:ogc:def:uom:EPSG::9001'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(5999000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

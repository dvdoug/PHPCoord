<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(44.2, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(-123.05, 'urn:ogc:def:uom:EPSG::9110'),
    'scaleFactorAtNaturalOrigin' => UnitOfMeasureFactory::makeUnit(1.00001, 'urn:ogc:def:uom:EPSG::9201'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(164041.9948, 'urn:ogc:def:uom:EPSG::9002'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9002'),
];

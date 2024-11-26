<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(-18.0, 'urn:ogc:def:uom:EPSG::9102'),
    'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(178.0, 'urn:ogc:def:uom:EPSG::9102'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(544000.0, 'urn:ogc:def:uom:EPSG::9098'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(704000.0, 'urn:ogc:def:uom:EPSG::9098'),
];

<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOffset' => UnitOfMeasureFactory::makeUnit(12.06, 'urn:ogc:def:uom:EPSG::9104'),
    'longitudeOffset' => UnitOfMeasureFactory::makeUnit(-8.38, 'urn:ogc:def:uom:EPSG::9104'),
    'geoidHeight' => UnitOfMeasureFactory::makeUnit(31.0, 'urn:ogc:def:uom:EPSG::9001'),
];

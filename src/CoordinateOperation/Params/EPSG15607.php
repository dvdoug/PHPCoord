<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOffset' => UnitOfMeasureFactory::makeUnit(9.1, 'urn:ogc:def:uom:EPSG::9104'),
    'longitudeOffset' => UnitOfMeasureFactory::makeUnit(-14.56, 'urn:ogc:def:uom:EPSG::9104'),
    'geoidHeight' => UnitOfMeasureFactory::makeUnit(32.6, 'urn:ogc:def:uom:EPSG::9001'),
];

<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOffset' => UnitOfMeasureFactory::makeUnit(10.54, 'urn:ogc:def:uom:EPSG::9104'),
    'longitudeOffset' => UnitOfMeasureFactory::makeUnit(-11.96, 'urn:ogc:def:uom:EPSG::9104'),
    'geoidHeight' => UnitOfMeasureFactory::makeUnit(39.1, 'urn:ogc:def:uom:EPSG::9001'),
];

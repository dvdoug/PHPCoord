<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOffset' => UnitOfMeasureFactory::makeUnit(11.78, 'urn:ogc:def:uom:EPSG::9104'),
    'longitudeOffset' => UnitOfMeasureFactory::makeUnit(-10.79, 'urn:ogc:def:uom:EPSG::9104'),
    'geoidHeight' => UnitOfMeasureFactory::makeUnit(39.8, 'urn:ogc:def:uom:EPSG::9001'),
];

<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOffset' => UnitOfMeasureFactory::makeUnit(10.29, 'urn:ogc:def:uom:EPSG::9104'),
    'longitudeOffset' => UnitOfMeasureFactory::makeUnit(-12.13, 'urn:ogc:def:uom:EPSG::9104'),
    'geoidHeight' => UnitOfMeasureFactory::makeUnit(38.5, 'urn:ogc:def:uom:EPSG::9001'),
];

<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOffset' => UnitOfMeasureFactory::makeUnit(11.65, 'urn:ogc:def:uom:EPSG::9104'),
    'longitudeOffset' => UnitOfMeasureFactory::makeUnit(-8.59, 'urn:ogc:def:uom:EPSG::9104'),
    'geoidUndulation' => UnitOfMeasureFactory::makeUnit(29.7, 'urn:ogc:def:uom:EPSG::9001'),
];

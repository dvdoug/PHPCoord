<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOffset' => UnitOfMeasureFactory::makeUnit(11.55, 'urn:ogc:def:uom:EPSG::9104'),
    'longitudeOffset' => UnitOfMeasureFactory::makeUnit(-9.8, 'urn:ogc:def:uom:EPSG::9104'),
    'geoidUndulation' => UnitOfMeasureFactory::makeUnit(35.4, 'urn:ogc:def:uom:EPSG::9001'),
];

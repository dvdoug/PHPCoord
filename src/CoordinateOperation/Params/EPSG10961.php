<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(308.9415, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(136.202, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(986.3661, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-3.8742, 'urn:ogc:def:uom:EPSG::9104'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(3.77827, 'urn:ogc:def:uom:EPSG::9104'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-7.61345, 'urn:ogc:def:uom:EPSG::9104'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-171.67315, 'urn:ogc:def:uom:EPSG::9202'),
];

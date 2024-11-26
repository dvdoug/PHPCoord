<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.991, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(1.9072, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.5129, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-1.25033E-7, 'urn:ogc:def:uom:EPSG::9101'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-4.6785E-8, 'urn:ogc:def:uom:EPSG::9101'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-5.6529E-8, 'urn:ogc:def:uom:EPSG::9101'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9202'),
];

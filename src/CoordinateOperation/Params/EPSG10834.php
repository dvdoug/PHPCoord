<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-2.0796, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.3484, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(1.7009, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(0.05465, 'urn:ogc:def:uom:EPSG::9104'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.06718, 'urn:ogc:def:uom:EPSG::9104'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(0.06143, 'urn:ogc:def:uom:EPSG::9104'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(0.0181, 'urn:ogc:def:uom:EPSG::9202'),
];

<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-40.7436, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-40.0018, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-56.707, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-1.2753, 'urn:ogc:def:uom:EPSG::9104'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-1.42112, 'urn:ogc:def:uom:EPSG::9104'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(2.69445, 'urn:ogc:def:uom:EPSG::9104'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-4.5284, 'urn:ogc:def:uom:EPSG::9202'),
];

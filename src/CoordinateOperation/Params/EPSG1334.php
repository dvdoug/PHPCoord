<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(21.58719, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-97.54127, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-60.92546, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-1.01378, 'urn:ogc:def:uom:EPSG::9104'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.58117, 'urn:ogc:def:uom:EPSG::9104'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.2348, 'urn:ogc:def:uom:EPSG::9104'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-4.6121, 'urn:ogc:def:uom:EPSG::9202'),
];

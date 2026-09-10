<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(565.7381, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(50.4018, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(465.2904, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(1.91514, 'urn:ogc:def:uom:EPSG::9109'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-1.60363, 'urn:ogc:def:uom:EPSG::9109'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(9.09546, 'urn:ogc:def:uom:EPSG::9109'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(4.07244, 'urn:ogc:def:uom:EPSG::9202'),
];

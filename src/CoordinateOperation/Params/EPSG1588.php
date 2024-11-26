<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-116.641, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-56.931, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-110.559, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(4.327, 'urn:ogc:def:uom:EPSG::9109'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(4.464, 'urn:ogc:def:uom:EPSG::9109'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-4.444, 'urn:ogc:def:uom:EPSG::9109'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-3.52, 'urn:ogc:def:uom:EPSG::9202'),
];

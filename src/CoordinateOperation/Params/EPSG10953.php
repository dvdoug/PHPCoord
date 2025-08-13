<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(1015.75, 'urn:ogc:def:uom:EPSG::1025'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-1920.11, 'urn:ogc:def:uom:EPSG::1025'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-559.77, 'urn:ogc:def:uom:EPSG::1025'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(27.78143, 'urn:ogc:def:uom:EPSG::1031'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-11.78187, 'urn:ogc:def:uom:EPSG::1031'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(10.16211, 'urn:ogc:def:uom:EPSG::1031'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-1.13124, 'urn:ogc:def:uom:EPSG::1028'),
];

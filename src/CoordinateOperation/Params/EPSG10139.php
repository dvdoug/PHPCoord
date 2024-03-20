<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.5, 'urn:ogc:def:uom:EPSG::1033'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(3.6, 'urn:ogc:def:uom:EPSG::1033'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(2.4, 'urn:ogc:def:uom:EPSG::1033'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.1, 'urn:ogc:def:uom:EPSG::1031'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-3.1, 'urn:ogc:def:uom:EPSG::1028'),
];

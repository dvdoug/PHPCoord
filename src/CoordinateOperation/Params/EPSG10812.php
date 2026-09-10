<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.36749, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.14351, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.18472, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(4.7914, 'urn:ogc:def:uom:EPSG::1031'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-10.27566, 'urn:ogc:def:uom:EPSG::1031'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(2.76102, 'urn:ogc:def:uom:EPSG::1031'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-3.684, 'urn:ogc:def:uom:EPSG::1028'),
    'pointMotionVelocityGridFile' => 'PHPCoord\\CoordinateOperation\\GeoTiffNKGRF17velEuropeProvider',
    'sourceEpoch' => UnitOfMeasureFactory::makeUnit(2000.0, 'urn:ogc:def:uom:EPSG::1029'),
    'targetEpoch' => UnitOfMeasureFactory::makeUnit(2003.75, 'urn:ogc:def:uom:EPSG::1029'),
];

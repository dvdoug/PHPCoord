<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'offsetsFile' => 'PHPCoord\\CoordinateOperation\\GeoTiffNKGETRF14EPSG7922NorwayProvider',
    'pointMotionVelocityGridFile' => 'PHPCoord\\CoordinateOperation\\GeoTiffNKGRF17velEuropeProvider',
    'sourceEpoch' => UnitOfMeasureFactory::makeUnit(2000.0, 'urn:ogc:def:uom:EPSG::1029'),
    'targetEpoch' => UnitOfMeasureFactory::makeUnit(1995.0, 'urn:ogc:def:uom:EPSG::1029'),
];

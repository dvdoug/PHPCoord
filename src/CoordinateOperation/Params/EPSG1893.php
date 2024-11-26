<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(11.0, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(72.0, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-101.0, 'urn:ogc:def:uom:EPSG::9001'),
];

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.2773, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0534, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.4819, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0935, 'urn:ogc:def:uom:EPSG::9109'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.0286, 'urn:ogc:def:uom:EPSG::9109'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(0.00969, 'urn:ogc:def:uom:EPSG::9109'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-0.028, 'urn:ogc:def:uom:EPSG::9202'),
];

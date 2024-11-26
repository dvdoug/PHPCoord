<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(202.865, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(303.99, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(155.873, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(34.067, 'urn:ogc:def:uom:EPSG::9104'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-76.126, 'urn:ogc:def:uom:EPSG::9104'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-32.647, 'urn:ogc:def:uom:EPSG::9104'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-6.096, 'urn:ogc:def:uom:EPSG::9202'),
    'ordinate1OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(-2361757.652, 'urn:ogc:def:uom:EPSG::9001'),
    'ordinate2OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(5417232.187, 'urn:ogc:def:uom:EPSG::9001'),
    'ordinate3OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(2391453.053, 'urn:ogc:def:uom:EPSG::9001'),
];

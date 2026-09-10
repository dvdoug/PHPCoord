<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-102.283, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-10.277, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-257.396, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-3.976, 'urn:ogc:def:uom:EPSG::9104'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.002, 'urn:ogc:def:uom:EPSG::9104'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-6.203, 'urn:ogc:def:uom:EPSG::9104'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(12.315, 'urn:ogc:def:uom:EPSG::9202'),
    'ordinate1OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(5580868.818, 'urn:ogc:def:uom:EPSG::9001'),
    'ordinate2OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(2826402.46, 'urn:ogc:def:uom:EPSG::9001'),
    'ordinate3OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(-1243557.996, 'urn:ogc:def:uom:EPSG::9001'),
];

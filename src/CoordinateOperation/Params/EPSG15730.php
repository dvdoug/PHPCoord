<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(300.449, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(293.757, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-317.306, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(6.018581E-5, 'urn:ogc:def:uom:EPSG::9101'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-1.450002E-5, 'urn:ogc:def:uom:EPSG::9101'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.0001892455, 'urn:ogc:def:uom:EPSG::9101'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-20.81615, 'urn:ogc:def:uom:EPSG::9202'),
    'ordinate1OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(1891881.173, 'urn:ogc:def:uom:EPSG::9001'),
    'ordinate2OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(-5961263.267, 'urn:ogc:def:uom:EPSG::9001'),
    'ordinate3OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(1248403.057, 'urn:ogc:def:uom:EPSG::9001'),
];

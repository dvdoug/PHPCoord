<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(306.666, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(315.063, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-318.837, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-7.992173E-5, 'urn:ogc:def:uom:EPSG::9101'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-8.090698E-6, 'urn:ogc:def:uom:EPSG::9101'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0001051699, 'urn:ogc:def:uom:EPSG::9101'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-13.89912, 'urn:ogc:def:uom:EPSG::9202'),
    'ordinate1OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(1845222.398, 'urn:ogc:def:uom:EPSG::9001'),
    'ordinate2OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(-6058604.495, 'urn:ogc:def:uom:EPSG::9001'),
    'ordinate3OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(769132.398, 'urn:ogc:def:uom:EPSG::9001'),
];

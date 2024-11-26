<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(302.529, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(317.979, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-319.08, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(1.361566E-5, 'urn:ogc:def:uom:EPSG::9101'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-2.174456E-6, 'urn:ogc:def:uom:EPSG::9101'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-1.362418E-5, 'urn:ogc:def:uom:EPSG::9101'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-2.199976, 'urn:ogc:def:uom:EPSG::9202'),
    'ordinate1OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(1738580.767, 'urn:ogc:def:uom:EPSG::9001'),
    'ordinate2OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(-6120500.388, 'urn:ogc:def:uom:EPSG::9001'),
    'ordinate3OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(491473.306, 'urn:ogc:def:uom:EPSG::9001'),
];

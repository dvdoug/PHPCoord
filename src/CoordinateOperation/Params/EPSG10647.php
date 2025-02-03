<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9104'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9104'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9104'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9202'),
    'rateOfChangeOfXAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.00726, 'urn:ogc:def:uom:EPSG::1042'),
    'rateOfChangeOfYAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.00848, 'urn:ogc:def:uom:EPSG::1042'),
    'rateOfChangeOfZAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.01353, 'urn:ogc:def:uom:EPSG::1042'),
    'rateOfChangeOfXAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1043'),
    'rateOfChangeOfYAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1043'),
    'rateOfChangeOfZAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1043'),
    'rateOfChangeOfScaleDifference' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1041'),
    'parameterReferenceEpoch' => UnitOfMeasureFactory::makeUnit(2020.0, 'urn:ogc:def:uom:EPSG::1029'),
];

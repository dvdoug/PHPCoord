<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.30031, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-1.17512, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.30654, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(0.041614, 'urn:ogc:def:uom:EPSG::9104'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.026303, 'urn:ogc:def:uom:EPSG::9104'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.011214, 'urn:ogc:def:uom:EPSG::9104'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-0.01626, 'urn:ogc:def:uom:EPSG::9202'),
    'rateOfChangeOfXAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1042'),
    'rateOfChangeOfYAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1042'),
    'rateOfChangeOfZAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1042'),
    'rateOfChangeOfXAxisRotation' => UnitOfMeasureFactory::makeUnit(4.5E-5, 'urn:ogc:def:uom:EPSG::1043'),
    'rateOfChangeOfYAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.000666, 'urn:ogc:def:uom:EPSG::1043'),
    'rateOfChangeOfZAxisRotation' => UnitOfMeasureFactory::makeUnit(-9.8E-5, 'urn:ogc:def:uom:EPSG::1043'),
    'rateOfChangeOfScaleDifference' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1041'),
    'parameterReferenceEpoch' => UnitOfMeasureFactory::makeUnit(2021.6164, 'urn:ogc:def:uom:EPSG::1029'),
];

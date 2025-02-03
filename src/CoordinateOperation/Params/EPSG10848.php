<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-47.48, 'urn:ogc:def:uom:EPSG::1025'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(11.76, 'urn:ogc:def:uom:EPSG::1025'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.58, 'urn:ogc:def:uom:EPSG::1025'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1028'),
    'rateOfChangeOfXAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1027'),
    'rateOfChangeOfYAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1027'),
    'rateOfChangeOfZAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1027'),
    'rateOfChangeOfXAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.099, 'urn:ogc:def:uom:EPSG::1032'),
    'rateOfChangeOfYAxisRotation' => UnitOfMeasureFactory::makeUnit(0.614, 'urn:ogc:def:uom:EPSG::1032'),
    'rateOfChangeOfZAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.733, 'urn:ogc:def:uom:EPSG::1032'),
    'rateOfChangeOfScaleDifference' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1030'),
    'parameterReferenceEpoch' => UnitOfMeasureFactory::makeUnit(2021.112, 'urn:ogc:def:uom:EPSG::1029'),
];

<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-1.6, 'urn:ogc:def:uom:EPSG::1025'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-1.9, 'urn:ogc:def:uom:EPSG::1025'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-2.4, 'urn:ogc:def:uom:EPSG::1025'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(0.02, 'urn:ogc:def:uom:EPSG::1028'),
    'rateOfChangeOfXAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1027'),
    'rateOfChangeOfYAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1027'),
    'rateOfChangeOfZAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.1, 'urn:ogc:def:uom:EPSG::1027'),
    'rateOfChangeOfXAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1032'),
    'rateOfChangeOfYAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1032'),
    'rateOfChangeOfZAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1032'),
    'rateOfChangeOfScaleDifference' => UnitOfMeasureFactory::makeUnit(-0.03, 'urn:ogc:def:uom:EPSG::1030'),
    'parameterReferenceEpoch' => UnitOfMeasureFactory::makeUnit(2010.0, 'urn:ogc:def:uom:EPSG::1029'),
];

<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-1.4, 'urn:ogc:def:uom:EPSG::1025'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-1.1, 'urn:ogc:def:uom:EPSG::1025'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(1.8, 'urn:ogc:def:uom:EPSG::1025'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-0.42, 'urn:ogc:def:uom:EPSG::1028'),
    'rateOfChangeOfXAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1027'),
    'rateOfChangeOfYAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.1, 'urn:ogc:def:uom:EPSG::1027'),
    'rateOfChangeOfZAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.2, 'urn:ogc:def:uom:EPSG::1027'),
    'rateOfChangeOfXAxisRotation' => UnitOfMeasureFactory::makeUnit(-1.199, 'urn:ogc:def:uom:EPSG::1032'),
    'rateOfChangeOfYAxisRotation' => UnitOfMeasureFactory::makeUnit(0.107, 'urn:ogc:def:uom:EPSG::1032'),
    'rateOfChangeOfZAxisRotation' => UnitOfMeasureFactory::makeUnit(-1.468, 'urn:ogc:def:uom:EPSG::1032'),
    'rateOfChangeOfScaleDifference' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1030'),
    'parameterReferenceEpoch' => UnitOfMeasureFactory::makeUnit(2017.0, 'urn:ogc:def:uom:EPSG::1029'),
];

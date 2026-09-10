<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(336.026, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(348.565, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(252.978, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-8.358813E-5, 'urn:ogc:def:uom:EPSG::9101'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-3.057474E-5, 'urn:ogc:def:uom:EPSG::9101'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(7.573031E-6, 'urn:ogc:def:uom:EPSG::9101'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(-5.771909, 'urn:ogc:def:uom:EPSG::9202'),
];

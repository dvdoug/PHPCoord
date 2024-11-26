<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(7.532017225, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(-72.301033542, 'urn:ogc:def:uom:EPSG::9110'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(842805.406, 'urn:ogc:def:uom:EPSG::9001'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(1364404.57, 'urn:ogc:def:uom:EPSG::9001'),
    'projectionPlaneOriginHeight' => UnitOfMeasureFactory::makeUnit(308.0, 'urn:ogc:def:uom:EPSG::9001'),
];

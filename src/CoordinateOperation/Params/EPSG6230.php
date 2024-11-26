<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(1.120356225, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(-77.151125228, 'urn:ogc:def:uom:EPSG::9110'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(980469.695, 'urn:ogc:def:uom:EPSG::9001'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(624555.332, 'urn:ogc:def:uom:EPSG::9001'),
    'projectionPlaneOriginHeight' => UnitOfMeasureFactory::makeUnit(2530.0, 'urn:ogc:def:uom:EPSG::9001'),
];

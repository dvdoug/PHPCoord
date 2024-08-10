<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(45.1833, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(-86.0, 'urn:ogc:def:uom:EPSG::9110'),
    'azimuthAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(337.25556, 'urn:ogc:def:uom:EPSG::9102'),
    'angleFromRectifiedToSkewGrid' => UnitOfMeasureFactory::makeUnit(337.25556, 'urn:ogc:def:uom:EPSG::9102'),
    'scaleFactorAtProjectionCentre' => UnitOfMeasureFactory::makeUnit(0.9996, 'urn:ogc:def:uom:EPSG::9201'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(2546731.496, 'urn:ogc:def:uom:EPSG::9001'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(-4354009.816, 'urn:ogc:def:uom:EPSG::9001'),
];

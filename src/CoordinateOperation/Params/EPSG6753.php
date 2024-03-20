<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(45.55, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(-123.0, 'urn:ogc:def:uom:EPSG::9110'),
    'azimuthOfInitialLine' => UnitOfMeasureFactory::makeUnit(295.0, 'urn:ogc:def:uom:EPSG::9102'),
    'angleFromRectifiedToSkewGrid' => UnitOfMeasureFactory::makeUnit(295.0, 'urn:ogc:def:uom:EPSG::9102'),
    'scaleFactorOnInitialLine' => UnitOfMeasureFactory::makeUnit(1.0, 'urn:ogc:def:uom:EPSG::9201'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(7000000.0, 'urn:ogc:def:uom:EPSG::9001'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(-3000000.0, 'urn:ogc:def:uom:EPSG::9001'),
];

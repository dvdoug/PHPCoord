<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(49.3, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfOrigin' => UnitOfMeasureFactory::makeUnit(24.5, 'urn:ogc:def:uom:EPSG::9110'),
    'coLatitudeOfConeAxis' => UnitOfMeasureFactory::makeUnit(30.171730311, 'urn:ogc:def:uom:EPSG::9110'),
    'latitudeOfPseudoStandardParallel' => UnitOfMeasureFactory::makeUnit(78.3, 'urn:ogc:def:uom:EPSG::9110'),
    'scaleFactorOnPseudoStandardParallel' => UnitOfMeasureFactory::makeUnit(0.9999, 'urn:ogc:def:uom:EPSG::9201'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9001'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9001'),
];

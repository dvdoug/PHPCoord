<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfProjectionCentre' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(49.3, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'longitudeOfOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(42.3, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'coLatitudeOfConeAxis' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(30.171730311, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'latitudeOfPseudoStandardParallel' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(78.3, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'scaleFactorOnPseudoStandardParallel' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(0.9999, 'urn:ogc:def:uom:EPSG::9201'),
  ],
  'falseEasting' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'falseNorthing' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfNaturalOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(15.375, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'longitudeOfNaturalOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(74.0, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'scaleFactorAtNaturalOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(0.9999913, 'urn:ogc:def:uom:EPSG::9201'),
  ],
  'falseEasting' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(1000000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'falseNorthing' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(1000000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

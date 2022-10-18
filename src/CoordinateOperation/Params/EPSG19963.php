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
    'value' => UnitOfMeasureFactory::makeUnit(6.4, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'longitudeOfNaturalOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(-12.0, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'scaleFactorAtNaturalOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(1.0, 'urn:ogc:def:uom:EPSG::9201'),
  ],
  'falseEasting' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(500000.0, 'urn:ogc:def:uom:EPSG::9094'),
  ],
  'falseNorthing' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9094'),
  ],
];

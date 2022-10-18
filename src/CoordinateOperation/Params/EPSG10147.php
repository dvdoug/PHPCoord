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
    'value' => UnitOfMeasureFactory::makeUnit(-28.0, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'longitudeOfNaturalOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(153.0, 'urn:ogc:def:uom:EPSG::9102'),
  ],
  'scaleFactorAtNaturalOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(0.99999, 'urn:ogc:def:uom:EPSG::9201'),
  ],
  'falseEasting' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(150000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'falseNorthing' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(200000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

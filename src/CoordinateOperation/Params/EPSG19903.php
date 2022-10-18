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
    'value' => UnitOfMeasureFactory::makeUnit(55.0, 'urn:ogc:def:uom:EPSG::9105'),
  ],
  'longitudeOfNaturalOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(6.0, 'urn:ogc:def:uom:EPSG::9105'),
  ],
  'scaleFactorAtNaturalOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(0.99950908, 'urn:ogc:def:uom:EPSG::9201'),
  ],
  'falseEasting' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(500000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'falseNorthing' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(300000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

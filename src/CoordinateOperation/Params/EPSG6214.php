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
    'value' => UnitOfMeasureFactory::makeUnit(10.55234591, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'longitudeOfNaturalOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(-74.50035928, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'falseEasting' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(917264.406, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'falseNorthing' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(1699839.935, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'projectionPlaneOriginHeight' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(100.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

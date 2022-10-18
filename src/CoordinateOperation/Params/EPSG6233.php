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
    'value' => UnitOfMeasureFactory::makeUnit(6.105059709, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'longitudeOfNaturalOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(-67.300270089, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'falseEasting' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(1063834.703, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'falseNorthing' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(1175257.481, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'projectionPlaneOriginHeight' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(51.58, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

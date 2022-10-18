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
    'value' => UnitOfMeasureFactory::makeUnit(3.263078, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'longitudeOfNaturalOrigin' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(-76.3114025, 'urn:ogc:def:uom:EPSG::9110'),
  ],
  'falseEasting' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(1061900.18, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'falseNorthing' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(872364.63, 'urn:ogc:def:uom:EPSG::9001'),
  ],
  'projectionPlaneOriginHeight' => [
    'reverses' => false,
    'value' => UnitOfMeasureFactory::makeUnit(1000.0, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

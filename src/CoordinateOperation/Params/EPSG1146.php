<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-82.981, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-99.719, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-110.709, 'urn:ogc:def:uom:EPSG::9001'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.5076, 'urn:ogc:def:uom:EPSG::9109'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(0.1503, 'urn:ogc:def:uom:EPSG::9109'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(0.3898, 'urn:ogc:def:uom:EPSG::9109'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(-0.3143, 'urn:ogc:def:uom:EPSG::9202'),
];

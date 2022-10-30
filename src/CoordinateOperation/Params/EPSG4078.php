<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-83.11, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-97.38, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-117.22, 'urn:ogc:def:uom:EPSG::9001'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0276, 'urn:ogc:def:uom:EPSG::9109'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.2167, 'urn:ogc:def:uom:EPSG::9109'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(0.2147, 'urn:ogc:def:uom:EPSG::9109'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(0.1218, 'urn:ogc:def:uom:EPSG::9202'),
];

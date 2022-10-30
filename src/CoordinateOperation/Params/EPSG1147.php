<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-1.51, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.84, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-3.5, 'urn:ogc:def:uom:EPSG::9001'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-1.893, 'urn:ogc:def:uom:EPSG::9109'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.687, 'urn:ogc:def:uom:EPSG::9109'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-2.764, 'urn:ogc:def:uom:EPSG::9109'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(0.609, 'urn:ogc:def:uom:EPSG::9202'),
];

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(612.4, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(77.0, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(440.2, 'urn:ogc:def:uom:EPSG::9001'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.054, 'urn:ogc:def:uom:EPSG::9104'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(0.057, 'urn:ogc:def:uom:EPSG::9104'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-2.797, 'urn:ogc:def:uom:EPSG::9104'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(2.55, 'urn:ogc:def:uom:EPSG::9202'),
];

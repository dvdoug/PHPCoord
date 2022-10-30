<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(599.4, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(72.4, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(419.2, 'urn:ogc:def:uom:EPSG::9001'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.062, 'urn:ogc:def:uom:EPSG::9104'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.022, 'urn:ogc:def:uom:EPSG::9104'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-2.723, 'urn:ogc:def:uom:EPSG::9104'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(6.46, 'urn:ogc:def:uom:EPSG::9202'),
];

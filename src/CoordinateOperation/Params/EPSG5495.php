<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(1.2239, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(2.4156, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-1.7598, 'urn:ogc:def:uom:EPSG::9001'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(0.038, 'urn:ogc:def:uom:EPSG::9104'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.16101, 'urn:ogc:def:uom:EPSG::9104'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.04925, 'urn:ogc:def:uom:EPSG::9104'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(0.2387, 'urn:ogc:def:uom:EPSG::9202'),
];

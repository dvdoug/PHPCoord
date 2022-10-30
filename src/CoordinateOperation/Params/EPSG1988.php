<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-288.885, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-91.744, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(126.244, 'urn:ogc:def:uom:EPSG::9001'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(1.691, 'urn:ogc:def:uom:EPSG::9104'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.41, 'urn:ogc:def:uom:EPSG::9104'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(0.211, 'urn:ogc:def:uom:EPSG::9104'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(-4.598, 'urn:ogc:def:uom:EPSG::9202'),
];

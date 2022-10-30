<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-292.295, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(248.758, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(429.447, 'urn:ogc:def:uom:EPSG::9001'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-4.9971, 'urn:ogc:def:uom:EPSG::9104'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-2.99, 'urn:ogc:def:uom:EPSG::9104'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-6.6906, 'urn:ogc:def:uom:EPSG::9104'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(1.0289, 'urn:ogc:def:uom:EPSG::9202'),
];

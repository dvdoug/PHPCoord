<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(61.55, 'urn:ogc:def:uom:EPSG::1025'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-10.87, 'urn:ogc:def:uom:EPSG::1025'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-40.19, 'urn:ogc:def:uom:EPSG::1025'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(-39.4924, 'urn:ogc:def:uom:EPSG::1031'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(-32.7221, 'urn:ogc:def:uom:EPSG::1031'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(-32.8979, 'urn:ogc:def:uom:EPSG::1031'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(-9.994, 'urn:ogc:def:uom:EPSG::1028'),
];

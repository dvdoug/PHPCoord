<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.2, 'urn:ogc:def:uom:EPSG::1033'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.4, 'urn:ogc:def:uom:EPSG::1033'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(1.6, 'urn:ogc:def:uom:EPSG::1033'),
  'xAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
  'yAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
  'zAxisRotation' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::1031'),
  'scaleDifference' => UnitOfMeasureFactory::makeUnit(-0.3, 'urn:ogc:def:uom:EPSG::1028'),
];

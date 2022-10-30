<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(275.57, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(676.78, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(229.6, 'urn:ogc:def:uom:EPSG::9001'),
];

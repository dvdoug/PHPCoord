<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.41, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.46, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.35, 'urn:ogc:def:uom:EPSG::9001'),
];

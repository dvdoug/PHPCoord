<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-67.35, 'urn:ogc:def:uom:EPSG::9001'),
  'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(3.88, 'urn:ogc:def:uom:EPSG::9001'),
  'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-38.22, 'urn:ogc:def:uom:EPSG::9001'),
];

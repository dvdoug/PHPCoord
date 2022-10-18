<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'longitudeOffset' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-17.4, 'urn:ogc:def:uom:EPSG::9110'),
  ],
];

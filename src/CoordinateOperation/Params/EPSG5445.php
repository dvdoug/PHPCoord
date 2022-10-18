<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'verticalOffset' => [
    'reverses' => true,
    'value' => UnitOfMeasureFactory::makeUnit(-26.3, 'urn:ogc:def:uom:EPSG::9001'),
  ],
];

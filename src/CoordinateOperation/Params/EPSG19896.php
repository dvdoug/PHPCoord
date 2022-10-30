<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(22.184368, 'urn:ogc:def:uom:EPSG::9110'),
  'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(114.10428, 'urn:ogc:def:uom:EPSG::9110'),
  'falseEasting' => UnitOfMeasureFactory::makeUnit(132033.92, 'urn:ogc:def:uom:EPSG::9005'),
  'falseNorthing' => UnitOfMeasureFactory::makeUnit(62565.96, 'urn:ogc:def:uom:EPSG::9005'),
];

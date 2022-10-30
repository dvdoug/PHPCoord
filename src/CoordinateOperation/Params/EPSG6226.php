<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(1.145988972, 'urn:ogc:def:uom:EPSG::9110'),
  'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(-70.140766196, 'urn:ogc:def:uom:EPSG::9110'),
  'falseEasting' => UnitOfMeasureFactory::makeUnit(1093717.398, 'urn:ogc:def:uom:EPSG::9001'),
  'falseNorthing' => UnitOfMeasureFactory::makeUnit(629997.236, 'urn:ogc:def:uom:EPSG::9001'),
  'projectionPlaneOriginHeight' => UnitOfMeasureFactory::makeUnit(170.0, 'urn:ogc:def:uom:EPSG::9001'),
];

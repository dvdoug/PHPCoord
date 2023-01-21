<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
  'latitudeOfProjectionCentre' => UnitOfMeasureFactory::makeUnit(49.3, 'urn:ogc:def:uom:EPSG::9110'),
  'longitudeOfOrigin' => UnitOfMeasureFactory::makeUnit(42.3, 'urn:ogc:def:uom:EPSG::9110'),
  'coLatitudeOfConeAxis' => UnitOfMeasureFactory::makeUnit(30.1717303, 'urn:ogc:def:uom:EPSG::9110'),
  'latitudeOfPseudoStandardParallel' => UnitOfMeasureFactory::makeUnit(78.3, 'urn:ogc:def:uom:EPSG::9110'),
  'scaleFactorOnPseudoStandardParallel' => UnitOfMeasureFactory::makeUnit(0.9999, 'urn:ogc:def:uom:EPSG::9201'),
  'falseEasting' => UnitOfMeasureFactory::makeUnit(5000000.0, 'urn:ogc:def:uom:EPSG::9001'),
  'falseNorthing' => UnitOfMeasureFactory::makeUnit(5000000.0, 'urn:ogc:def:uom:EPSG::9001'),
  'ordinate1OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(1089000.0, 'urn:ogc:def:uom:EPSG::9001'),
  'ordinate2OfEvaluationPoint' => UnitOfMeasureFactory::makeUnit(654000.0, 'urn:ogc:def:uom:EPSG::9001'),
  'C1' => UnitOfMeasureFactory::makeUnit(0.02946529277, 'urn:ogc:def:uom:EPSG::9203'),
  'C2' => UnitOfMeasureFactory::makeUnit(0.02515965696, 'urn:ogc:def:uom:EPSG::9203'),
  'C3' => UnitOfMeasureFactory::makeUnit(1.193845912E-7, 'urn:ogc:def:uom:EPSG::9203'),
  'C4' => UnitOfMeasureFactory::makeUnit(-4.668270147E-7, 'urn:ogc:def:uom:EPSG::9203'),
  'C5' => UnitOfMeasureFactory::makeUnit(9.233980362E-12, 'urn:ogc:def:uom:EPSG::9203'),
  'C6' => UnitOfMeasureFactory::makeUnit(1.523735715E-12, 'urn:ogc:def:uom:EPSG::9203'),
  'C7' => UnitOfMeasureFactory::makeUnit(1.696780024E-18, 'urn:ogc:def:uom:EPSG::9203'),
  'C8' => UnitOfMeasureFactory::makeUnit(4.408314235E-18, 'urn:ogc:def:uom:EPSG::9203'),
  'C9' => UnitOfMeasureFactory::makeUnit(-8.331083518E-24, 'urn:ogc:def:uom:EPSG::9203'),
  'C10' => UnitOfMeasureFactory::makeUnit(-3.689471323E-24, 'urn:ogc:def:uom:EPSG::9203'),
];

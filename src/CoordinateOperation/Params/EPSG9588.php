<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

/** @internal */ return [
  'geoidHeightCorrectionModelFile' => [
    'reverses' => true,
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\OSTN15OSGM15Provider',
  ],
  'EPSGCodeForInterpolationCRS' => [
    'value' => 'urn:ogc:def:crs:EPSG::4258',
    'uom' => null,
    'reverses' => false,
  ],
];

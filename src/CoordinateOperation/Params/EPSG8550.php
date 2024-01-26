<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

/** @internal */ return [
  'latitudeDifferenceFile' => [
    'reverses' => true,
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5NAD831986NAD831992AlaskaLatitudeProvider',
  ],
  'longitudeDifferenceFile' => [
    'reverses' => true,
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5NAD831986NAD831992AlaskaLongitudeProvider',
  ],
  'ellipsoidalHeightDifferenceFile' => [
    'value' => null,
    'uom' => null,
    'reverses' => false,
  ],
];

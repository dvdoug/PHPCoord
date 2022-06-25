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
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5PR40NAD831986PRVILatitudeProvider',
  ],
  'longitudeDifferenceFile' => [
    'reverses' => true,
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5PR40NAD831986PRVILongitudeProvider',
  ],
  'ellipsoidalHeightDifferenceFile' => [
    'value' => null,
    'uom' => null,
    'reverses' => false,
  ],
];

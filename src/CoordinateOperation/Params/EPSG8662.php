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
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5AS62NAD831993ASLatitudeProvider',
  ],
  'longitudeDifferenceFile' => [
    'reverses' => true,
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5AS62NAD831993ASLongitudeProvider',
  ],
  'ellipsoidalHeightDifferenceFile' => [
    'reverses' => false,
    'value' => null,
  ],
];

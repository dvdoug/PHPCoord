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
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5NAD831986NAD831993PRVILatitudeProvider',
  ],
  'longitudeDifferenceFile' => [
    'reverses' => true,
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5NAD831986NAD831993PRVILongitudeProvider',
  ],
  'ellipsoidalHeightDifferenceFile' => [
    'reverses' => false,
    'value' => null,
  ],
];

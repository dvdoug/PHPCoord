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
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5NAD831986NAD83HARNCONUSLatitudeProvider',
  ],
  'longitudeDifferenceFile' => [
    'reverses' => true,
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5NAD831986NAD83HARNCONUSLongitudeProvider',
  ],
  'ellipsoidalHeightDifferenceFile' => [
    'value' => null,
    'uom' => null,
    'reverses' => false,
  ],
];

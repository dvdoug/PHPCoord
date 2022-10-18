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
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5OHDNAD831986HawaiiLatitudeProvider',
  ],
  'longitudeDifferenceFile' => [
    'reverses' => true,
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5OHDNAD831986HawaiiLongitudeProvider',
  ],
  'ellipsoidalHeightDifferenceFile' => [
    'reverses' => false,
    'value' => null,
  ],
];

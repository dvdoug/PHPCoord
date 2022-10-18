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
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5GU63NAD831993GuamCnMILatitudeProvider',
  ],
  'longitudeDifferenceFile' => [
    'reverses' => true,
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5GU63NAD831993GuamCnMILongitudeProvider',
  ],
  'ellipsoidalHeightDifferenceFile' => [
    'reverses' => false,
    'value' => null,
  ],
];

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
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5SL1952NAD831986StLawrenceLatitudeProvider',
  ],
  'longitudeDifferenceFile' => [
    'reverses' => true,
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5SL1952NAD831986StLawrenceLongitudeProvider',
  ],
  'ellipsoidalHeightDifferenceFile' => [
    'value' => null,
    'uom' => null,
    'reverses' => false,
  ],
];

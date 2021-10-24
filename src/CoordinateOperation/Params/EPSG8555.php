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
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5NAD27NAD831986CONUSLatitudeProvider',
  ],
  'longitudeDifferenceFile' => [
    'reverses' => true,
    'fileProvider' => 'PHPCoord\\CoordinateOperation\\NADCON5NAD27NAD831986CONUSLongitudeProvider',
  ],
  'ellipsoidalHeightDifferenceFile' => [
    'value' => null,
    'uom' => null,
    'reverses' => false,
  ],
];

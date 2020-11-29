<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

use function in_array;
use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\ExoticAngle;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\ExoticLength;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Coefficient;
use PHPCoord\UnitOfMeasure\Scale\ExoticScale;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use PHPCoord\UnitOfMeasure\Time\Second;
use PHPCoord\UnitOfMeasure\Time\Year;

class UnitOfMeasureFactory
{
    protected static array $sridData = [
        'urn:ogc:def:uom:EPSG::1024' => [
            'name' => '(bin)',
            'type' => 'scale',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9201',
            'factor_b' => 1.0,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::1025' => [
            'name' => 'millimetre',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 1.0,
            'factor_c' => 1000.0,
        ],
        'urn:ogc:def:uom:EPSG::1026' => [
            'name' => 'metre per second',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::1026',
            'factor_b' => 1.0,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::1027' => [
            'name' => 'millimetres per year',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::1026',
            'factor_b' => 1.0,
            'factor_c' => 31556925445.0,
        ],
        'urn:ogc:def:uom:EPSG::1028' => [
            'name' => 'parts per billion',
            'type' => 'scale',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9201',
            'factor_b' => 1.0,
            'factor_c' => 1000000000.0,
        ],
        'urn:ogc:def:uom:EPSG::1029' => [
            'name' => 'year',
            'type' => 'time',
            'target_uom' => 'urn:ogc:def:uom:EPSG::1040',
            'factor_b' => 31556925.445,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::1030' => [
            'name' => 'parts per billion per year',
            'type' => 'scale',
            'target_uom' => 'urn:ogc:def:uom:EPSG::1036',
            'factor_b' => 1.0,
            'factor_c' => 3.1556925445E+16,
        ],
        'urn:ogc:def:uom:EPSG::1031' => [
            'name' => 'milliarc-second',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9101',
            'factor_b' => 3.14159265358979,
            'factor_c' => 648000000.0,
        ],
        'urn:ogc:def:uom:EPSG::1032' => [
            'name' => 'milliarc-seconds per year',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::1035',
            'factor_b' => 3.14159265358979,
            'factor_c' => 2.044888768836E+16,
        ],
        'urn:ogc:def:uom:EPSG::1033' => [
            'name' => 'centimetre',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 1.0,
            'factor_c' => 100.0,
        ],
        'urn:ogc:def:uom:EPSG::1034' => [
            'name' => 'centimetres per year',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::1026',
            'factor_b' => 1.0,
            'factor_c' => 3155692544.5,
        ],
        'urn:ogc:def:uom:EPSG::1035' => [
            'name' => 'radian per second',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::1035',
            'factor_b' => 1.0,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::1036' => [
            'name' => 'unity per second',
            'type' => 'scale',
            'target_uom' => 'urn:ogc:def:uom:EPSG::1036',
            'factor_b' => 1.0,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::1040' => [
            'name' => 'second',
            'type' => 'time',
            'target_uom' => 'urn:ogc:def:uom:EPSG::1040',
            'factor_b' => 1.0,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::1041' => [
            'name' => 'parts per million per year',
            'type' => 'scale',
            'target_uom' => 'urn:ogc:def:uom:EPSG::1036',
            'factor_b' => 1.0,
            'factor_c' => 31556925445000.0,
        ],
        'urn:ogc:def:uom:EPSG::1042' => [
            'name' => 'metres per year',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::1026',
            'factor_b' => 1.0,
            'factor_c' => 31556925.445,
        ],
        'urn:ogc:def:uom:EPSG::1043' => [
            'name' => 'arc-seconds per year',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::1035',
            'factor_b' => 3.14159265358979,
            'factor_c' => 20448887688360.0,
        ],
        'urn:ogc:def:uom:EPSG::9001' => [
            'name' => 'metre',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 1.0,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9002' => [
            'name' => 'foot',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.3048,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9003' => [
            'name' => 'US survey foot',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 12.0,
            'factor_c' => 39.37,
        ],
        'urn:ogc:def:uom:EPSG::9005' => [
            'name' => 'Clarke\'s foot',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.3047972654,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9014' => [
            'name' => 'fathom',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 1.8288,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9030' => [
            'name' => 'nautical mile',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 1852.0,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9031' => [
            'name' => 'German legal metre',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 1.0000135965,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9033' => [
            'name' => 'US survey chain',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 792.0,
            'factor_c' => 39.37,
        ],
        'urn:ogc:def:uom:EPSG::9034' => [
            'name' => 'US survey link',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 7.92,
            'factor_c' => 39.37,
        ],
        'urn:ogc:def:uom:EPSG::9035' => [
            'name' => 'US survey mile',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 63360.0,
            'factor_c' => 39.37,
        ],
        'urn:ogc:def:uom:EPSG::9036' => [
            'name' => 'kilometre',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 1000.0,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9037' => [
            'name' => 'Clarke\'s yard',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.9143917962,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9038' => [
            'name' => 'Clarke\'s chain',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 20.1166195164,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9039' => [
            'name' => 'Clarke\'s link',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.201166195164,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9040' => [
            'name' => 'British yard (Sears 1922)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 36.0,
            'factor_c' => 39.370147,
        ],
        'urn:ogc:def:uom:EPSG::9041' => [
            'name' => 'British foot (Sears 1922)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 12.0,
            'factor_c' => 39.370147,
        ],
        'urn:ogc:def:uom:EPSG::9042' => [
            'name' => 'British chain (Sears 1922)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 792.0,
            'factor_c' => 39.370147,
        ],
        'urn:ogc:def:uom:EPSG::9043' => [
            'name' => 'British link (Sears 1922)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 7.92,
            'factor_c' => 39.370147,
        ],
        'urn:ogc:def:uom:EPSG::9050' => [
            'name' => 'British yard (Benoit 1895 A)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.9143992,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9051' => [
            'name' => 'British foot (Benoit 1895 A)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.9143992,
            'factor_c' => 3.0,
        ],
        'urn:ogc:def:uom:EPSG::9052' => [
            'name' => 'British chain (Benoit 1895 A)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 20.1167824,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9053' => [
            'name' => 'British link (Benoit 1895 A)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.201167824,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9060' => [
            'name' => 'British yard (Benoit 1895 B)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 36.0,
            'factor_c' => 39.370113,
        ],
        'urn:ogc:def:uom:EPSG::9061' => [
            'name' => 'British foot (Benoit 1895 B)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 12.0,
            'factor_c' => 39.370113,
        ],
        'urn:ogc:def:uom:EPSG::9062' => [
            'name' => 'British chain (Benoit 1895 B)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 792.0,
            'factor_c' => 39.370113,
        ],
        'urn:ogc:def:uom:EPSG::9063' => [
            'name' => 'British link (Benoit 1895 B)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 7.92,
            'factor_c' => 39.370113,
        ],
        'urn:ogc:def:uom:EPSG::9070' => [
            'name' => 'British foot (1865)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.9144025,
            'factor_c' => 3.0,
        ],
        'urn:ogc:def:uom:EPSG::9080' => [
            'name' => 'Indian foot',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 12.0,
            'factor_c' => 39.370142,
        ],
        'urn:ogc:def:uom:EPSG::9081' => [
            'name' => 'Indian foot (1937)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.30479841,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9082' => [
            'name' => 'Indian foot (1962)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.3047996,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9083' => [
            'name' => 'Indian foot (1975)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.3047995,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9084' => [
            'name' => 'Indian yard',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 36.0,
            'factor_c' => 39.370142,
        ],
        'urn:ogc:def:uom:EPSG::9085' => [
            'name' => 'Indian yard (1937)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.91439523,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9086' => [
            'name' => 'Indian yard (1962)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.9143988,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9087' => [
            'name' => 'Indian yard (1975)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.9143985,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9093' => [
            'name' => 'Statute mile',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 1609.344,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9094' => [
            'name' => 'Gold Coast foot',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 6378300.0,
            'factor_c' => 20926201.0,
        ],
        'urn:ogc:def:uom:EPSG::9095' => [
            'name' => 'British foot (1936)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.3048007491,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9096' => [
            'name' => 'yard',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.9144,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9097' => [
            'name' => 'chain',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 20.1168,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9098' => [
            'name' => 'link',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 20.1168,
            'factor_c' => 100.0,
        ],
        'urn:ogc:def:uom:EPSG::9099' => [
            'name' => 'British yard (Sears 1922 truncated)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.914398,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9101' => [
            'name' => 'radian',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9101',
            'factor_b' => 1.0,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9102' => [
            'name' => 'degree',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9101',
            'factor_b' => 3.14159265358979,
            'factor_c' => 180.0,
        ],
        'urn:ogc:def:uom:EPSG::9103' => [
            'name' => 'arc-minute',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9101',
            'factor_b' => 3.14159265358979,
            'factor_c' => 10800.0,
        ],
        'urn:ogc:def:uom:EPSG::9104' => [
            'name' => 'arc-second',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9101',
            'factor_b' => 3.14159265358979,
            'factor_c' => 648000.0,
        ],
        'urn:ogc:def:uom:EPSG::9105' => [
            'name' => 'grad',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9101',
            'factor_b' => 3.14159265358979,
            'factor_c' => 200.0,
        ],
        'urn:ogc:def:uom:EPSG::9106' => [
            'name' => 'gon',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9101',
            'factor_b' => 3.14159265358979,
            'factor_c' => 200.0,
        ],
        'urn:ogc:def:uom:EPSG::9107' => [
            'name' => 'degree minute second',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9102',
            'factor_b' => null,
            'factor_c' => null,
        ],
        'urn:ogc:def:uom:EPSG::9108' => [
            'name' => 'degree minute second hemisphere',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9102',
            'factor_b' => null,
            'factor_c' => null,
        ],
        'urn:ogc:def:uom:EPSG::9109' => [
            'name' => 'microradian',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9101',
            'factor_b' => 1.0,
            'factor_c' => 1000000.0,
        ],
        'urn:ogc:def:uom:EPSG::9110' => [
            'name' => 'sexagesimal DMS',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9102',
            'factor_b' => null,
            'factor_c' => null,
        ],
        'urn:ogc:def:uom:EPSG::9111' => [
            'name' => 'sexagesimal DM',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9102',
            'factor_b' => null,
            'factor_c' => null,
        ],
        'urn:ogc:def:uom:EPSG::9112' => [
            'name' => 'centesimal minute',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9101',
            'factor_b' => 3.14159265358979,
            'factor_c' => 20000.0,
        ],
        'urn:ogc:def:uom:EPSG::9113' => [
            'name' => 'centesimal second',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9101',
            'factor_b' => 3.14159265358979,
            'factor_c' => 2000000.0,
        ],
        'urn:ogc:def:uom:EPSG::9114' => [
            'name' => 'mil_6400',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9101',
            'factor_b' => 3.14159265358979,
            'factor_c' => 3200.0,
        ],
        'urn:ogc:def:uom:EPSG::9115' => [
            'name' => 'degree minute',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9102',
            'factor_b' => null,
            'factor_c' => null,
        ],
        'urn:ogc:def:uom:EPSG::9116' => [
            'name' => 'degree hemisphere',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9102',
            'factor_b' => null,
            'factor_c' => null,
        ],
        'urn:ogc:def:uom:EPSG::9117' => [
            'name' => 'hemisphere degree',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9102',
            'factor_b' => null,
            'factor_c' => null,
        ],
        'urn:ogc:def:uom:EPSG::9118' => [
            'name' => 'degree minute hemisphere',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9102',
            'factor_b' => null,
            'factor_c' => null,
        ],
        'urn:ogc:def:uom:EPSG::9119' => [
            'name' => 'hemisphere degree minute',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9102',
            'factor_b' => null,
            'factor_c' => null,
        ],
        'urn:ogc:def:uom:EPSG::9120' => [
            'name' => 'hemisphere degree minute second',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9102',
            'factor_b' => null,
            'factor_c' => null,
        ],
        'urn:ogc:def:uom:EPSG::9121' => [
            'name' => 'sexagesimal DMS.s',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9104',
            'factor_b' => null,
            'factor_c' => null,
        ],
        'urn:ogc:def:uom:EPSG::9122' => [
            'name' => 'degree (supplier to define representation)',
            'type' => 'angle',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9101',
            'factor_b' => 3.14159265358979,
            'factor_c' => 180.0,
        ],
        'urn:ogc:def:uom:EPSG::9201' => [
            'name' => 'unity',
            'type' => 'scale',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9201',
            'factor_b' => 1.0,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9202' => [
            'name' => 'parts per million',
            'type' => 'scale',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9201',
            'factor_b' => 1.0,
            'factor_c' => 1000000.0,
        ],
        'urn:ogc:def:uom:EPSG::9203' => [
            'name' => 'coefficient',
            'type' => 'scale',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9201',
            'factor_b' => 1.0,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9204' => [
            'name' => 'Bin width 330 US survey feet',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 3960.0,
            'factor_c' => 39.37,
        ],
        'urn:ogc:def:uom:EPSG::9205' => [
            'name' => 'Bin width 165 US survey feet',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 1980.0,
            'factor_c' => 39.37,
        ],
        'urn:ogc:def:uom:EPSG::9206' => [
            'name' => 'Bin width 82.5 US survey feet',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 990.0,
            'factor_c' => 39.37,
        ],
        'urn:ogc:def:uom:EPSG::9207' => [
            'name' => 'Bin width 37.5 metres',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 37.5,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9208' => [
            'name' => 'Bin width 25 metres',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 25.0,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9209' => [
            'name' => 'Bin width 12.5 metres',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 12.5,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9210' => [
            'name' => 'Bin width 6.25 metres',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 6.25,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9211' => [
            'name' => 'Bin width 3.125 metres',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 3.125,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9300' => [
            'name' => 'British foot (Sears 1922 truncated)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 0.914398,
            'factor_c' => 3.0,
        ],
        'urn:ogc:def:uom:EPSG::9301' => [
            'name' => 'British chain (Sears 1922 truncated)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 20.116756,
            'factor_c' => 1.0,
        ],
        'urn:ogc:def:uom:EPSG::9302' => [
            'name' => 'British link (Sears 1922 truncated)',
            'type' => 'length',
            'target_uom' => 'urn:ogc:def:uom:EPSG::9001',
            'factor_b' => 20.116756,
            'factor_c' => 100.0,
        ],
    ];

    /**
     * @param float|string $measurement
     */
    public static function makeUnit($measurement, string $srid): UnitOfMeasure
    {
        if (!isset(static::$sridData[$srid])) {
            throw new UnknownUnitOfMeasureException($srid);
        }

        $data = static::$sridData[$srid];

        /*
         * Common units (and those that require special handling) having discrete implementations,
         * try those first.
         */
        switch ($srid) {
            case UnitOfMeasure::EPSG_ANGLE_RADIAN_PER_SECOND:
                return new Rate(new Radian($measurement), new Second(1));
            case UnitOfMeasure::EPSG_ANGLE_ARC_SECONDS_PER_YEAR:
                return new Rate(new ArcSecond($measurement), new Year(1));
            case UnitOfMeasure::EPSG_ANGLE_MILLIARC_SECONDS_PER_YEAR:
                return new Rate(self::makeUnit($measurement, UnitOfMeasure::EPSG_ANGLE_MILLIARC_SECOND), new Year(1));
            case UnitOfMeasure::EPSG_LENGTH_METRE_PER_SECOND:
                return new Rate(new Metre($measurement), new Second(1));
            case UnitOfMeasure::EPSG_LENGTH_METRES_PER_YEAR:
                return new Rate(new Metre($measurement), new Year(1));
            case UnitOfMeasure::EPSG_LENGTH_MILLIMETRES_PER_YEAR:
                return new Rate(self::makeUnit($measurement, UnitOfMeasure::EPSG_LENGTH_MILLIMETRE), new Year(1));
            case UnitOfMeasure::EPSG_LENGTH_CENTIMETRES_PER_YEAR:
                return new Rate(self::makeUnit($measurement, UnitOfMeasure::EPSG_LENGTH_CENTIMETRE), new Year(1));
            case UnitOfMeasure::EPSG_SCALE_UNITY_PER_SECOND:
                return new Rate(new Unity($measurement), new Second(1));
            case UnitOfMeasure::EPSG_SCALE_PARTS_PER_BILLION_PER_YEAR:
                return new Rate(self::makeUnit($measurement, UnitOfMeasure::EPSG_SCALE_PARTS_PER_BILLION), new Year(1));
            case UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION_PER_YEAR:
                return new Rate(self::makeUnit($measurement, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION), new Year(1));
            case UnitOfMeasure::EPSG_ANGLE_RADIAN:
                return new Radian($measurement);
            case UnitOfMeasure::EPSG_ANGLE_DEGREE:
                return new Degree($measurement);
            case UnitOfMeasure::EPSG_ANGLE_ARC_SECOND:
                return new ArcSecond($measurement);
            case UnitOfMeasure::EPSG_ANGLE_DEGREE_MINUTE_SECOND:
                return Degree::fromDegreeMinuteSecond((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_DEGREE_MINUTE_SECOND_HEMISPHERE:
                return Degree::fromDegreeMinuteSecondHemisphere((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE_SECOND:
                return Degree::fromHemisphereDegreeMinuteSecond((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_DEGREE_MINUTE:
                return Degree::fromDegreeMinute((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_DEGREE_MINUTE_HEMISPHERE:
                return Degree::fromDegreeMinuteHemisphere((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE:
                return Degree::fromHemisphereDegreeMinute((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_DEGREE_HEMISPHERE:
                return Degree::fromDegreeHemisphere((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_HEMISPHERE_DEGREE:
                return Degree::fromHemisphereDegree((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_SEXAGESIMAL_DMS_S:
                return Degree::fromSexagesimalDMSS((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_SEXAGESIMAL_DMS:
                return Degree::fromSexagesimalDMS((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_SEXAGESIMAL_DM:
                return Degree::fromSexagesimalDM((string) $measurement);
            case UnitOfMeasure::EPSG_LENGTH_METRE:
                return new Metre($measurement);
            case UnitOfMeasure::EPSG_SCALE_COEFFICIENT:
                return new Coefficient($measurement);
            case UnitOfMeasure::EPSG_SCALE_UNITY:
                return new Unity($measurement);
            case UnitOfMeasure::EPSG_TIME_SECOND:
                return new Second($measurement);
            case UnitOfMeasure::EPSG_TIME_YEAR:
                return new Year($measurement);
        }

        /*
         * Check that the unit can be defined by reference to SI, if it can't it needs special handling and needs to be
         * in the list above
         */
        // @codeCoverageIgnoreStart
        if ($data['factor_b'] === null ||
            !in_array(
                $data['target_uom'],
                [
                    UnitOfMeasure::EPSG_ANGLE_RADIAN,
                    UnitOfMeasure::EPSG_LENGTH_METRE,
                    UnitOfMeasure::EPSG_SCALE_UNITY,
                    //UnitOfMeasure::EPSG_TIME_SECOND,  all time units in the DB are currently handled above
                ],
                true
            )
        ) {
            throw new UnknownUnitOfMeasureException($srid);
        }
        // @codeCoverageIgnoreEnd

        switch ($data['type']) {
            case 'angle':
                return new ExoticAngle($measurement, $data['name'], $data['factor_b'], $data['factor_c']);
            case 'length':
                return new ExoticLength($measurement, $data['name'], $data['factor_b'], $data['factor_c']);
            case 'scale':
                return new ExoticScale($measurement, $data['name'], $data['factor_b'], $data['factor_c']);
        }
    }

    public static function convertAngle(Angle $angle, string $targetSRID): Angle
    {
        if ($targetSRID === UnitOfMeasure::EPSG_ANGLE_DEGREE_SUPPLIER_TO_DEFINE_REPRESENTATION) {
            $targetSRID = UnitOfMeasure::EPSG_ANGLE_DEGREE;
        }

        if (!isset(static::$sridData[$targetSRID])) {
            throw new UnknownUnitOfMeasureException($targetSRID);
        }

        $targetUnitData = static::$sridData[$targetSRID];

        return self::makeUnit($angle->asRadians()->getValue() * $targetUnitData['factor_c'] / $targetUnitData['factor_b'], $targetSRID);
    }

    public static function convertLength(Length $length, string $targetSRID): Length
    {
        if (!isset(static::$sridData[$targetSRID])) {
            throw new UnknownUnitOfMeasureException($targetSRID);
        }

        $targetUnitData = static::$sridData[$targetSRID];

        return self::makeUnit($length->asMetres()->getValue() * $targetUnitData['factor_c'] / $targetUnitData['factor_b'], $targetSRID);
    }

    public static function getSupportedSRIDs(): array
    {
        $supported = [];
        foreach (static::$sridData as $srid => $sridData) {
            $supported[$srid] = $sridData['name'];
        }

        return $supported;
    }
}

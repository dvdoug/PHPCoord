<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use function class_alias;
use function class_exists;

if (!class_exists('PHPCoord\Point')) {
    class_alias(Point::class, 'PHPCoord\Point');
}

if (!class_exists('PHPCoord\BritishNationalGridPoint')) {
    class_alias(BritishNationalGridPoint::class, 'PHPCoord\BritishNationalGridPoint');
}

if (!class_exists('PHPCoord\CompoundPoint')) {
    class_alias(CompoundPoint::class, 'PHPCoord\CompoundPoint');
}

if (!class_exists('PHPCoord\GeocentricPoint')) {
    class_alias(GeocentricPoint::class, 'PHPCoord\GeocentricPoint');
}

if (!class_exists('PHPCoord\GeographicPoint')) {
    class_alias(GeographicPoint::class, 'PHPCoord\GeographicPoint');
}

if (!class_exists('PHPCoord\IrishGridPoint')) {
    class_alias(IrishGridPoint::class, 'PHPCoord\IrishGridPoint');
}

if (!class_exists('PHPCoord\IrishTransverseMercatorPoint')) {
    class_alias(IrishTransverseMercatorPoint::class, 'PHPCoord\IrishTransverseMercatorPoint');
}

if (!class_exists('PHPCoord\ProjectedPoint')) {
    class_alias(ProjectedPoint::class, 'PHPCoord\ProjectedPoint');
}

if (!class_exists('PHPCoord\UTMPoint')) {
    class_alias(UTMPoint::class, 'PHPCoord\UTMPoint');
}

if (!class_exists('PHPCoord\VerticalPoint')) {
    class_alias(VerticalPoint::class, 'PHPCoord\VerticalPoint');
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use function class_alias;

class_alias(Point::class, 'PHPCoord\Point');
class_alias(BritishNationalGridPoint::class, 'PHPCoord\BritishNationalGridPoint');
class_alias(CompoundPoint::class, 'PHPCoord\CompoundPoint');
class_alias(GeocentricPoint::class, 'PHPCoord\GeocentricPoint');
class_alias(GeographicPoint::class, 'PHPCoord\GeographicPoint');
class_alias(IrishGridPoint::class, 'PHPCoord\IrishGridPoint');
class_alias(IrishTransverseMercatorPoint::class, 'PHPCoord\IrishTransverseMercatorPoint');
class_alias(ProjectedPoint::class, 'PHPCoord\ProjectedPoint');
class_alias(UTMPoint::class, 'PHPCoord\UTMPoint');
class_alias(VerticalPoint::class, 'PHPCoord\VerticalPoint');

<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use function array_change_key_case;
use function class_alias;
use function class_exists;
use function spl_autoload_register;
use function strtolower;

/*
 * Backwards compatible aliases for the old namespace are declared in the files of the point classes, so the old names
 * work in type declarations, instanceof and catch whenever a class is loaded. Here the classes are only autoloaded
 * when an old name is used. Loading them eagerly would also load the large CRS classes (e.g. ProjectedPoint needs
 * Projected for return type checks), which costs tens of MB of memory in every process using Composer's autoloader.
 */
(static function (): void {
    $aliases = [
        'PHPCoord\Point' => Point::class,
        'PHPCoord\BritishNationalGridPoint' => BritishNationalGridPoint::class,
        'PHPCoord\CompoundPoint' => CompoundPoint::class,
        'PHPCoord\GeocentricPoint' => GeocentricPoint::class,
        'PHPCoord\GeographicPoint' => GeographicPoint::class,
        'PHPCoord\IrishGridPoint' => IrishGridPoint::class,
        'PHPCoord\IrishTransverseMercatorPoint' => IrishTransverseMercatorPoint::class,
        'PHPCoord\ProjectedPoint' => ProjectedPoint::class,
        'PHPCoord\UTMPoint' => UTMPoint::class,
        'PHPCoord\VerticalPoint' => VerticalPoint::class,
    ];

    // classes declared without running their files, e.g. by OPcache preloading
    foreach ($aliases as $alias => $class) {
        if (class_exists($class, false) && !class_exists($alias, false)) {
            class_alias($class, $alias);
        }
    }

    // class names are case-insensitive
    $aliases = array_change_key_case($aliases);

    spl_autoload_register(static function (string $name) use ($aliases): void {
        $class = $aliases[strtolower($name)] ?? null;
        if ($class !== null) {
            class_exists($class);
        }
    });
})();

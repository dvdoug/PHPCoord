<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 144°E to 150°E.
 * @internal
 */
class Extent3963
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [145.994403636, 31.573886834816], [144, 31.573886834816], [144, 23.035319133749], [145.994403636, 23.035319133749], [145.994403636, 31.573886834816],
                ],
            ],
            [
                [
                    [147.859705638, 45.649528158], [144, 45.649528158], [144, 33.585145152435], [147.859705638, 33.585145152435], [147.859705638, 45.649528158],
                ],
            ],
        ];
    }
}

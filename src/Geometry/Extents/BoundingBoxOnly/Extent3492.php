<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 156°W to 150°W - AK, HI.
 * @internal
 */
class Extent3492
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-151.276798641, 24.51890745474], [-156, 24.51890745474], [-156, 15.56312413], [-151.276798641, 15.56312413], [-151.276798641, 24.51890745474],
                ],
            ],
            [
                [
                    [-150, 74.706867342943], [-156, 74.706867342943], [-156, 52.158256578516], [-150, 52.158256578516], [-150, 74.706867342943],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 156°W to 150°W - AK, OCS.
 * @internal
 */
class Extent2135
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-150, 74.706867342943], [-156, 74.706867342943], [-156, 52.158256578516], [-150, 52.158256578516], [-150, 74.706867342943],
                ],
            ],
        ];
    }
}

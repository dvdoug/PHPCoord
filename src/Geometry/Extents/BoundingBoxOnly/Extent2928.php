<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 150°E to 156°E, 24°S to 28°S (SG56) onshore.
 * @internal
 */
class Extent2928
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [153.59715461731, -24], [150, -24], [150, -28], [153.59715461731, -28], [153.59715461731, -24],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 132°E to 138°E, 12°S to 16°S (SD53) onshore.
 * @internal
 */
class Extent2904
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [137.27891008024, -12], [132, -12], [132, -16], [137.27891008024, -16], [137.27891008024, -12],
                ],
            ],
        ];
    }
}

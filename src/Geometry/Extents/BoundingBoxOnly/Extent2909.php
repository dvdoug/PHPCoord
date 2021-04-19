<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 126°E to 132°E, 16°S to 20°S (SE52).
 * @internal
 */
class Extent2909
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132, -16], [126, -16], [126, -20], [132, -20], [132, -16],
                ],
            ],
        ];
    }
}

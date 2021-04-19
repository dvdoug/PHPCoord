<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 132°E to 138°E, 24°S to 28°S (SG53).
 * @internal
 */
class Extent2925
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [138, -24], [132, -24], [132, -28], [138, -28], [138, -24],
                ],
            ],
        ];
    }
}

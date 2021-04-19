<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 132°E to 138°E, 16°S to 20°S (SE53) onshore.
 * @internal
 */
class Extent2910
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [138, -16], [132, -16], [132, -20], [138, -20], [138, -16],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 114°E to 120°E, 16°S to 20°S (SE50) onshore.
 * @internal
 */
class Extent2907
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [119.52318495957, -19.907258987427], [118.94987226282, -19.907258987427], [118.94987226282, -20], [119.52318495957, -20], [119.52318495957, -19.907258987427],
                ],
            ],
            [
                [
                    [120, -19.88615930058], [119.61854962868, -19.88615930058], [119.61854962868, -20], [120, -20], [120, -19.88615930058],
                ],
            ],
        ];
    }
}

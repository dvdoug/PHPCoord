<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 114°E to 120°E, 20°S to 24°S (SF50) onshore.
 * @internal
 */
class Extent2914
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [120, -20], [114, -20], [114, -24], [120, -24], [120, -20],
                ],
            ],
        ];
    }
}

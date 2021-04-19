<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 114°E to 120°E, 24°S to 28°S (SG50) onshore.
 * @internal
 */
class Extent2922
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [120, -24], [114, -24], [114, -28], [120, -28], [120, -24],
                ],
            ],
        ];
    }
}

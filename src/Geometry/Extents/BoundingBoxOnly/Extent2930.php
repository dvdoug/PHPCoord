<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 114°E to 120°E, 28°S to 32°S (SH50) onshore.
 * @internal
 */
class Extent2930
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [120, -28], [114.07143467667, -28], [114.07143467667, -32], [120, -32], [120, -28],
                ],
            ],
        ];
    }
}

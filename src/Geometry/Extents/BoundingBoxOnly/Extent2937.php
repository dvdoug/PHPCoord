<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 114°E to 120°E, 32°S to 36°S (SI50) onshore.
 * @internal
 */
class Extent2937
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [120, -32], [114.89393806458, -32], [114.89393806458, -35.187810897827], [120, -35.187810897827], [120, -32],
                ],
            ],
        ];
    }
}

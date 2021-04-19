<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 144°E to 150°E, 32°S to 36°S (SI55).
 * @internal
 */
class Extent2941
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [150, -32], [144, -32], [144, -36], [150, -36], [150, -32],
                ],
            ],
        ];
    }
}

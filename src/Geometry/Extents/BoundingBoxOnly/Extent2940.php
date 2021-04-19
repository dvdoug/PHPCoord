<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 138°E to 144°E, 32°S to 36°S (SI54) onshore.
 * @internal
 */
class Extent2940
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [144, -32], [138, -32], [138, -36], [144, -36], [144, -32],
                ],
            ],
        ];
    }
}

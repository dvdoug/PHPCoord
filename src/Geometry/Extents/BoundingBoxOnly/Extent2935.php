<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 144°E to 150°E, 28°S to 32°S (SH55).
 * @internal
 */
class Extent2935
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [150, -28], [144, -28], [144, -32], [150, -32], [150, -28],
                ],
            ],
        ];
    }
}

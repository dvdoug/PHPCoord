<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 132°E to 138°E, 28°S to 32°S (SH53) onshore.
 * @internal
 */
class Extent2933
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [138, -28], [132, -28], [132, -32], [138, -32], [138, -28],
                ],
            ],
        ];
    }
}

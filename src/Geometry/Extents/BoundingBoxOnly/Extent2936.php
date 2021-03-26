<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 150°E to 156°E, 28°S to 32°S (SH56) onshore.
 * @internal
 */
class Extent2936
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [153.68103981018, -28], [150, -28], [150, -32], [153.68103981018, -32], [153.68103981018, -28],
                ],
            ],
        ];
    }
}

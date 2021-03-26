<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 120°E to 126°E, 28°S to 32°S (SH51).
 * @internal
 */
class Extent2931
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [126, -28], [120, -28], [120, -32], [126, -32], [126, -28],
                ],
            ],
        ];
    }
}

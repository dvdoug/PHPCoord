<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 138°E to 144°E, 28°S to 32°S (SH54).
 * @internal
 */
class Extent2934
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [144, -28], [138, -28], [138, -32], [144, -32], [144, -28],
                ],
            ],
        ];
    }
}

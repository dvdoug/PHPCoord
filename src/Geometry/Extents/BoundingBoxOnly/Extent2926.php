<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 138°E to 144°E, 24°S to 28°S (SG54).
 * @internal
 */
class Extent2926
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [144, -24], [138, -24], [138, -28], [144, -28], [144, -24],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 120°E to 126°E, 24°S to 28°S (SG51).
 * @internal
 */
class Extent2923
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [126, -24], [120, -24], [120, -28], [126, -28], [126, -24],
                ],
            ],
        ];
    }
}

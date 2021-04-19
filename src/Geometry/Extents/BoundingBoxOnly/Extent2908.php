<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 120°E to 126°E, 16°S to 20°S (SE51) onshore.
 * @internal
 */
class Extent2908
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [126, -16], [120, -16], [120, -20], [126, -20], [126, -16],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 138°E to 144°E, 16°S to 20°S (SE54) onshore.
 * @internal
 */
class Extent2911
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [144, -16], [138, -16], [138, -20], [144, -20], [144, -16],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 138°E to 144°E, 12°S to 16°S (SD54) onshore.
 * @internal
 */
class Extent2905
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [144, -12], [141.34887123108, -12], [141.34887123108, -16], [144, -16], [144, -12],
                ],
            ],
        ];
    }
}

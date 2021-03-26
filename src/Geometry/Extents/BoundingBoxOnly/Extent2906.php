<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 144°E to 150°E, 12°S to 16°S (SD55) onshore.
 * @internal
 */
class Extent2906
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [145.48783811639, -14.016520974253], [144, -14.016520974253], [144, -16], [145.48783811639, -16], [145.48783811639, -14.016520974253],
                ],
            ],
        ];
    }
}

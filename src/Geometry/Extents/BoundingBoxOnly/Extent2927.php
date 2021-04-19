<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 144°E to 150°E, 24°S to 28°S (SG55).
 * @internal
 */
class Extent2927
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [150, -24], [144, -24], [144, -28], [150, -28], [150, -24],
                ],
            ],
        ];
    }
}

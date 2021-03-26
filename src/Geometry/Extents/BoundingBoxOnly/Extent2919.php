<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 144°E to 150°E, 20°S to 24°S (SF55) onshore.
 * @internal
 */
class Extent2919
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [150, -20], [144, -20], [144, -24], [150, -24], [150, -20],
                ],
            ],
        ];
    }
}

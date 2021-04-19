<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 144°E to 150°E, 36°S to 40°S (SJ55) onshore.
 * @internal
 */
class Extent2945
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [150, -36], [144, -36], [144, -39.197008132935], [150, -39.197008132935], [150, -36],
                ],
            ],
        ];
    }
}

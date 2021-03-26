<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 108°E to 114°E, 24°S to 28°S (SG49) onshore.
 * @internal
 */
class Extent2921
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [114, -25.438613891602], [112.85186576843, -25.438613891602], [112.85186576843, -27.430241729221], [114, -27.430241729221], [114, -25.438613891602],
                ],
            ],
            [
                [
                    [114, -24], [113.32937812805, -24], [113.32937812805, -25.721170248293], [114, -25.721170248293], [114, -24],
                ],
            ],
        ];
    }
}

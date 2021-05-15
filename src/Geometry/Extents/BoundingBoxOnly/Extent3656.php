<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 15°E to 16°E.
 * @internal
 */
class Extent3656
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [16, 69.346804955966], [15, 69.346804955966], [15, 68.196535717116], [16, 68.196535717116], [16, 69.346804955966],
                ],
            ],
            [
                [
                    [16, 68.308612837463], [15, 68.308612837463], [15, 66.149510562239], [16, 66.149510562239], [16, 68.308612837463],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 124.5°E to 127.5°E onshore.
 * @internal
 */
class Extent2688
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [127.5, 73.99720954895], [124.5, 73.99720954895], [124.5, 50.246328729673], [127.5, 50.246328729673], [127.5, 73.99720954895],
                ],
            ],
            [
                [
                    [127.5, 50.062126591117], [127.48594856262, 50.062126591117], [127.48594856262, 49.886417782428], [127.5, 49.886417782428], [127.5, 50.062126591117],
                ],
            ],
        ];
    }
}

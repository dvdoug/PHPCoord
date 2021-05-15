<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Taiwan - onshore - mainland and Penghu.
 * @internal
 */
class Extent3315
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [119.77184137601, 23.810504313136], [119.25811024188, 23.810504313136], [119.25811024188, 23.137742347341], [119.77184137601, 23.137742347341], [119.77184137601, 23.810504313136],
                ],
            ],
            [
                [
                    [122.05485028066, 25.333732598502], [119.99569467659, 25.333732598502], [119.99569467659, 21.877614307656], [122.05485028066, 21.877614307656], [122.05485028066, 25.333732598502],
                ],
            ],
        ];
    }
}

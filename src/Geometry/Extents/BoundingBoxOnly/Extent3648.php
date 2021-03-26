<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 8ºE to 9ºE.
 * @internal
 */
class Extent3648
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [9, 63.862594088372], [8, 63.862594088372], [8, 58.035231032657], [9, 58.035231032657], [9, 63.862594088372],
                ],
            ],
        ];
    }
}

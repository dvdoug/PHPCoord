<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Italy - east of 12°E.
 * @internal
 */
class Extent1719
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [18.986794518, 47.094581604004], [12, 47.094581604004], [12, 34.766805148001], [18.986794518, 34.766805148001], [18.986794518, 47.094581604004],
                ],
            ],
        ];
    }
}

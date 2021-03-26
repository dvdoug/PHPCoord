<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Africa/Libya - 12°E to 18°E.
 * @internal
 */
class Extent3950
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [18, 35.225193149], [12, 35.225193149], [12, 22.517430544906], [18, 22.517430544906], [18, 35.225193149],
                ],
            ],
        ];
    }
}

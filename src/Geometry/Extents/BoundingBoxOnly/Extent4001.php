<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Germany - onshore 12°E to 13.5°E.
 * @internal
 */
class Extent4001
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [13.5, 54.732431145027], [12, 54.732431145027], [12, 47.469787597656], [13.5, 47.469787597656], [13.5, 54.732431145027],
                ],
            ],
        ];
    }
}

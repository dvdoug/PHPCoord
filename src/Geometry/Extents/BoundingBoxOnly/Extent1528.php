<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Turkey - 37.5°E to 40.5°E onshore.
 * @internal
 */
class Extent1528
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [40.5, 41.184710230363], [37.5, 41.184710230363], [37.5, 36.665340423584], [40.5, 36.665340423584], [40.5, 41.184710230363],
                ],
            ],
        ];
    }
}

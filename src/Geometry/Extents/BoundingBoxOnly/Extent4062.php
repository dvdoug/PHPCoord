<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 81°10'N to 76°10'N, 129°E to 160°E.
 * @internal
 */
class Extent4062
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [160.00000190735, 81.166666030884], [129.00000190735, 81.166666030884], [129.00000190735, 76.166666030884], [160.00000190735, 76.166666030884], [160.00000190735, 81.166666030884],
                ],
            ],
        ];
    }
}

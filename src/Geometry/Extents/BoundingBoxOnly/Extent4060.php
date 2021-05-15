<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 81°10'N to 76°10'N, 67°E to 98°E.
 * @internal
 */
class Extent4060
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [98.000001907349, 81.166666030884], [67.000001907349, 81.166666030884], [67.000001907349, 76.166666030884], [98.000001907349, 76.166666030884], [98.000001907349, 81.166666030884],
                ],
            ],
        ];
    }
}

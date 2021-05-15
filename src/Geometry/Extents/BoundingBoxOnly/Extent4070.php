<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 81°10'N to 76°10'N, 114°W to 84°W.
 * @internal
 */
class Extent4070
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-84, 81.166666030884], [-114, 81.166666030884], [-114, 76.166666030884], [-84, 76.166666030884], [-84, 81.166666030884],
                ],
            ],
        ];
    }
}

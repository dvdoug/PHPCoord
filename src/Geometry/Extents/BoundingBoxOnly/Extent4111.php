<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 71°10'N to 66°10'N,  156°W to 138°W.
 * @internal
 */
class Extent4111
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-138, 71.166666030884], [-156, 71.166666030884], [-156, 66.166666030884], [-138, 66.166666030884], [-138, 71.166666030884],
                ],
            ],
        ];
    }
}

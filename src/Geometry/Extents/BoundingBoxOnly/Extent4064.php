<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 81°10'N to 76°10'N,  169°W to 138°W.
 * @internal
 */
class Extent4064
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-138, 81.166666030884], [-169, 81.166666030884], [-169, 76.166666030884], [-138, 76.166666030884], [-138, 81.166666030884],
                ],
            ],
        ];
    }
}

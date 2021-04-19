<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 81°10'N to 76°10'N,  144°W to 114°W.
 * @internal
 */
class Extent4065
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-114, 81.166666030884], [-144, 81.166666030884], [-144, 76.166666030884], [-114, 76.166666030884], [-114, 81.166666030884],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Iraq - north of 36.2°N, west of 42°E (map 1).
 * @internal
 */
class Extent3714
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [42, 36.740386119411], [41.273529735491, 36.740386119411], [41.273529735491, 36.196233281727], [42, 36.196233281727], [42, 36.740386119411],
                ],
            ],
        ];
    }
}

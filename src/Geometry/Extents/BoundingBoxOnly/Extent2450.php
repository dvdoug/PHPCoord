<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 41°20'N to 42°N; 141°E to 142°E.
 * @internal
 */
class Extent2450
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [141.52220799126, 41.556471689074], [141, 41.556471689074], [141, 41.333066666667], [141.52220799126, 41.333066666667], [141.52220799126, 41.556471689074],
                ],
            ],
            [
                [
                    [141.26127443503, 41.957737224685], [141, 41.957737224685], [141, 41.657242090539], [141.26127443503, 41.657242090539], [141.26127443503, 41.957737224685],
                ],
            ],
        ];
    }
}

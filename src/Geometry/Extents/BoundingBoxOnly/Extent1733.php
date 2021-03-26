<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/France - mainland south of 45.45°N.
 * @internal
 */
class Extent1733
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [7.7090454101565, 45.45], [-1.7833566971618, 45.45], [-1.7833566971618, 42.332912445069], [7.7090454101565, 42.332912445069], [7.7090454101565, 45.45],
                ],
            ],
        ];
    }
}

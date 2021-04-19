<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 39°20'N to 40°N; 139°E to 140°E.
 * @internal
 */
class Extent2456
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [140, 39.999666666667], [139.6311508293, 39.999666666667], [139.6311508293, 39.681507968112], [140, 39.681507968112], [140, 39.999666666667],
                ],
            ],
            [
                [
                    [140, 39.543512548243], [139.92910170991, 39.543512548243], [139.92910170991, 39.332966666667], [140, 39.332966666667], [140, 39.543512548243],
                ],
            ],
        ];
    }
}

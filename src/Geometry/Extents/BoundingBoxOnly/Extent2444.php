<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - north of 42°N; west of 140°E.
 * @internal
 */
class Extent2444
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [140, 42.728024796545], [139.70234680179, 42.728024796545], [139.70234680179, 42.056237517945], [140, 42.056237517945], [140, 42.728024796545],
                ],
            ],
        ];
    }
}

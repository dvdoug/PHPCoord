<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 42°40'N to 43°20'N; 144°E to 145°E.
 * @internal
 */
class Extent2442
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [145, 43.333166666667], [144, 43.333166666667], [144, 42.849354336787], [145, 42.849354336787], [145, 43.333166666667],
                ],
            ],
        ];
    }
}

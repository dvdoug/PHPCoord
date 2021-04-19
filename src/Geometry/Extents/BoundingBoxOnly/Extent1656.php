<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Indonesia - 114°E to 120°E, S hemisphere.
 * @internal
 */
class Extent1656
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [120, 0], [114, 0], [114, -13.053830044426], [120, -13.053830044426], [120, 0],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Indonesia - 96°E to 102°E, S hemisphere.
 * @internal
 */
class Extent1650
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [102, 0], [96, 0], [96, -8.8529728331444], [102, -8.8529728331444], [102, 0],
                ],
            ],
        ];
    }
}

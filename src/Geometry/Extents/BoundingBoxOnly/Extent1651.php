<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Indonesia - 102°E to 108°E, N hemisphere.
 * @internal
 */
class Extent1651
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [108, 6.9398881652228], [102, 6.9398881652228], [102, 0], [108, 0], [108, 6.9398881652228],
                ],
            ],
        ];
    }
}

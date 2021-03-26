<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Indonesia - 102°E to 108°E, S hemisphere.
 * @internal
 */
class Extent1652
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [108, 0], [102, 0], [102, -10.729190663006], [108, -10.729190663006], [108, 0],
                ],
            ],
        ];
    }
}

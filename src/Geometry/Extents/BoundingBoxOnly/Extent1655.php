<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Indonesia - 114°E to 120°E, N hemisphere.
 * @internal
 */
class Extent1655
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [120, 4.3681240081788], [114, 4.3681240081788], [114, 0], [120, 0], [120, 4.3681240081788],
                ],
            ],
        ];
    }
}

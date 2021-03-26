<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Indonesia - 108°E to 114°E, S hemisphere.
 * @internal
 */
class Extent1654
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [114, 0], [108, 0], [108, -12.065151966844], [114, -12.065151966844], [114, 0],
                ],
            ],
        ];
    }
}

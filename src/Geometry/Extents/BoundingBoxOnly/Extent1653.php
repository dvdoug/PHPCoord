<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Indonesia - 108°E to 114°E, N hemisphere.
 * @internal
 */
class Extent1653
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [114, 7.3625241230003], [108, 7.3625241230003], [108, 0], [114, 0], [114, 7.3625241230003],
                ],
            ],
        ];
    }
}

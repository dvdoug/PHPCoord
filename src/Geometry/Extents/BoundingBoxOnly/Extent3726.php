<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Asia - Korea N and S - 128°E to 130°E.
 * @internal
 */
class Extent3726
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [130, 43.006099700928], [128, 43.006099700928], [128, 39.955588203148], [130, 39.955588203148], [130, 43.006099700928],
                ],
            ],
            [
                [
                    [129.64844701141, 38.938508835182], [128, 38.938508835182], [128, 34.493968005016], [129.64844701141, 34.493968005016], [129.64844701141, 38.938508835182],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Thailand - onshore and GoT 96°E to102°E.
 * @internal
 */
class Extent1667
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [99.752402082145, 6.7531645343201], [99.546520214606, 6.7531645343201], [99.546520214606, 6.4692233868241], [99.752402082145, 6.4692233868241], [99.752402082145, 6.7531645343201],
                ],
            ],
            [
                [
                    [102, 20.454578399658], [97.347274780274, 20.454578399658], [97.347274780274, 5.6334710121156], [102, 5.6334710121156], [102, 20.454578399658],
                ],
            ],
        ];
    }
}

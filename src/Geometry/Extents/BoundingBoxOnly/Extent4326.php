<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - Wisconsin - Douglas.
 * @internal
 */
class Extent4326
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-91.550743950232, 46.757483465464], [-92.293269858776, 46.757483465464], [-92.293269858776, 46.156936558926], [-91.550743950232, 46.156936558926], [-91.550743950232, 46.757483465464],
                ],
            ],
        ];
    }
}

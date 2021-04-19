<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Ukraine - 37°E to 40°E onshore.
 * @internal
 */
class Extent4433
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [40, 50.438041687012], [37, 50.438041687012], [37, 46.802088448491], [40, 46.802088448491], [40, 50.438041687012],
                ],
            ],
        ];
    }
}

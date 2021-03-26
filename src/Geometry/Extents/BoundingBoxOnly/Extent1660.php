<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Indonesia - 126°E to 132°E, S hemisphere.
 * @internal
 */
class Extent1660
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132, 0], [126, 0], [126, -9.4412379692325], [132, -9.4412379692325], [132, 0],
                ],
            ],
        ];
    }
}

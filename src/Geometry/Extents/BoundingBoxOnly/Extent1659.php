<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Indonesia - 126°E to 132°E, N hemisphere.
 * @internal
 */
class Extent1659
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132, 6.670852122], [126, 6.670852122], [126, 0], [132, 0], [132, 6.670852122],
                ],
            ],
        ];
    }
}

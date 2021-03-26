<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 126°E to 132°E onshore.
 * @internal
 */
class Extent1596
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132, 52.589153289795], [126, 52.589153289795], [126, 40.894064225946], [132, 40.894064225946], [132, 52.589153289795],
                ],
            ],
            [
                [
                    [126.09679412842, 52.781589508057], [126, 52.781589508057], [126, 52.670574656291], [126.09679412842, 52.670574656291], [126.09679412842, 52.781589508057],
                ],
            ],
        ];
    }
}

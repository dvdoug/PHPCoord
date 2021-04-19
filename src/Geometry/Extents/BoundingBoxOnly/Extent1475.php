<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Africa/Libya - 18°E to 20°E onshore.
 * @internal
 */
class Extent1475
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [20, 30.883031349248], [18, 30.883031349248], [18, 21.54932879902], [20, 21.54932879902], [20, 30.883031349248],
                ],
            ],
            [
                [
                    [20, 32.165269720091], [19.862333451495, 32.165269720091], [19.862333451495, 31.327684762608], [20, 31.327684762608], [20, 32.165269720091],
                ],
            ],
        ];
    }
}

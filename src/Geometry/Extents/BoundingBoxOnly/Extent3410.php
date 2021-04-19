<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - 138°W to 132°W.
 * @internal
 */
class Extent3410
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-132, 79.41717084388], [-138, 79.41717084388], [-138, 56.836413563413], [-132, 56.836413563413], [-132, 79.41717084388],
                ],
            ],
            [
                [
                    [-132, 54.517222167], [-138, 54.517222167], [-138, 48.065621604762], [-132, 48.065621604762], [-132, 54.517222167],
                ],
            ],
        ];
    }
}

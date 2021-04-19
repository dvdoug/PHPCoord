<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Finland - 25.5°E to 26.5°E onshore.
 * @internal
 */
class Extent3099
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [26.5, 69.938934821679], [25.5, 69.938934821679], [25.5, 60.183839770471], [26.5, 60.183839770471], [26.5, 69.938934821679],
                ],
            ],
        ];
    }
}

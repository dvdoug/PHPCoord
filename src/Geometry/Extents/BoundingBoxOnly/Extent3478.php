<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Jamaica - west of 78°W.
 * @internal
 */
class Extent3478
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-78, 19.356544134], [-80.591886575152, 19.356544134], [-80.591886575152, 14.167721549997], [-78, 14.167721549997], [-78, 19.356544134],
                ],
            ],
        ];
    }
}

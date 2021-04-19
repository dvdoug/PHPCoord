<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Argentina - 67.5°W to 64.5°W mainland onshore.
 * @internal
 */
class Extent4578
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-65.660697937012, -46.323844909668], [-67.5, -46.323844909668], [-67.5, -49.047536849976], [-65.660697937012, -49.047536849976], [-65.660697937012, -46.323844909668],
                ],
            ],
            [
                [
                    [-64.5, -21.780521392822], [-67.5, -21.780521392822], [-67.5, -45.98899269104], [-64.5, -45.98899269104], [-64.5, -21.780521392822],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Iraq - south of 29.7°N, west of 46.1°E (map 24).
 * @internal
 */
class Extent3711
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [46.034078467373, 29.740218272554], [43.991698867794, 29.740218272554], [43.991698867794, 29.094116157896], [46.034078467373, 29.094116157896], [46.034078467373, 29.740218272554],
                ],
            ],
        ];
    }
}

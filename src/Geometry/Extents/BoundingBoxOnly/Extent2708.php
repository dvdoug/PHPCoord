<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 175.5°W to 172.5°W onshore.
 * @internal
 */
class Extent2708
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-172.5, 67.776682136833], [-175.5, 67.776682136833], [-175.5, 64.208624], [-172.5, 64.208624], [-172.5, 67.776682136833],
                ],
            ],
        ];
    }
}

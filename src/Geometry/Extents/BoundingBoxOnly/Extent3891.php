<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - 60°W to 54°W and NAD27.
 * @internal
 */
class Extent3891
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-54, 68.923374085935], [-60, 68.923374085935], [-60, 40.575112154403], [-54, 40.575112154403], [-54, 68.923374085935],
                ],
            ],
        ];
    }
}

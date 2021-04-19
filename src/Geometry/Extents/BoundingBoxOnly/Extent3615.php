<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Moldova - west of 30°E.
 * @internal
 */
class Extent3615
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [30, 48.468322753906], [26.634994506836, 48.468322753906], [26.634994506836, 45.44864654541], [30, 45.44864654541], [30, 48.468322753906],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - 66°W to 60°W.
 * @internal
 */
class Extent3525
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, 84], [-66, 84], [-66, 80.89440188134], [-60, 80.89440188134], [-60, 84],
                ],
            ],
            [
                [
                    [-60, 73.241062868496], [-66, 73.241062868496], [-66, 40.040199904302], [-60, 40.040199904302], [-60, 73.241062868496],
                ],
            ],
        ];
    }
}

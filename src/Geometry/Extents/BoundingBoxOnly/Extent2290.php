<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Quebec, Newfoundland and Labrador - MTM zone 3.
 * @internal
 */
class Extent2290
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-57.109805945638, 55.377637690343], [-60, 55.377637690343], [-60, 50.200161667718], [-57.109805945638, 50.200161667718], [-57.109805945638, 55.377637690343],
                ],
            ],
            [
                [
                    [-57.5, 50.531986827464], [-59.477936442937, 50.531986827464], [-59.477936442937, 47.507338519471], [-57.5, 47.507338519471], [-57.5, 50.531986827464],
                ],
            ],
        ];
    }
}

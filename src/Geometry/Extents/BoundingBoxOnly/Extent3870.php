<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Costa Rica - onshore south of 9°56'N.
 * @internal
 */
class Extent3870
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-84.848879016827, 9.9333333333309], [-85.732300196823, 9.9333333333309], [-85.732300196823, 9.5393441134058], [-84.848879016827, 9.5393441134058], [-84.848879016827, 9.9333333333309],
                ],
            ],
            [
                [
                    [-82.534971334026, 9.9333333333326], [-84.884267498164, 9.9333333333326], [-84.884267498164, 7.9817113128033], [-82.534971334026, 7.9817113128033], [-82.534971334026, 9.9333333333326],
                ],
            ],
        ];
    }
}
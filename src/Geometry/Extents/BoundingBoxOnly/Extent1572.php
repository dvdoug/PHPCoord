<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Brazil - 54°W to 48°W and Aratu.
 * @internal
 */
class Extent1572
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-48, -25.22213935852], [-53.374298095703, -25.22213935852], [-53.374298095703, -35.708560943604], [-48, -35.708560943604], [-48, -25.22213935852],
                ],
            ],
            [
                [
                    [-48, -25.012138366699], [-48.054103851318, -25.012138366699], [-48.054103851318, -25.075201034546], [-48, -25.075201034546], [-48, -25.012138366699],
                ],
            ],
        ];
    }
}

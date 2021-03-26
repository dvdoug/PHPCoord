<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Mexico - 108°W to 102°W.
 * @internal
 */
class Extent3425
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-102, 31.783885955941], [-108, 31.783885955941], [-108, 14.057547737396], [-102, 14.057547737396], [-102, 31.783885955941],
                ],
            ],
        ];
    }
}

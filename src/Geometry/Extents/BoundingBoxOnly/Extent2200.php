<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - Kansas - SPCS - N.
 * @internal
 */
class Extent2200
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-94.588387, 40.003166], [-102.051769, 40.003166], [-102.051769, 38.521538], [-94.588387, 38.521538], [-94.588387, 40.003166],
                ],
            ],
        ];
    }
}

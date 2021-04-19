<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 174°W to 168°W - AK, OCS.
 * @internal
 */
class Extent3375
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-168, 73.041503415486], [-174, 73.041503415486], [-174, 48.669301986694], [-168, 48.669301986694], [-168, 73.041503415486],
                ],
            ],
        ];
    }
}

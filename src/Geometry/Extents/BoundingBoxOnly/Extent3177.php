<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Brazil - 48°W to 42°W and south of 15°S.
 * @internal
 */
class Extent3177
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-42, -15], [-48, -15], [-48, -25.285760879517], [-42, -25.285760879517], [-42, -15],
                ],
            ],
        ];
    }
}

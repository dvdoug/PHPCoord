<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/New Zealand - nearshore west of 168°E.
 * @internal
 */
class Extent3970
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [168, -42.593718605831], [165.87267490863, -42.593718605831], [165.87267490863, -47.643440148249], [168, -47.643440148249], [168, -42.593718605831],
                ],
            ],
        ];
    }
}

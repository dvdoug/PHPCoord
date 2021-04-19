<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/New Zealand - nearshore 168°E to 174°E.
 * @internal
 */
class Extent3971
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [174, -42.210137852179], [168, -42.210137852179], [168, -47.634451118693], [174, -47.634451118693], [174, -42.210137852179],
                ],
            ],
            [
                [
                    [174, -33.898535390185], [168, -33.898535390185], [168, -44.31108870606], [174, -44.31108870606], [174, -33.898535390185],
                ],
            ],
        ];
    }
}

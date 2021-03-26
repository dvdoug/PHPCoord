<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - SA 132°E to 138°E.
 * @internal
 */
class Extent3688
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [138, -35.489381983214], [136.47267341614, -35.489381983214], [136.47267341614, -36.135427474976], [138, -36.135427474976], [138, -35.489381983214],
                ],
            ],
            [
                [
                    [138, -25.995911], [132, -25.995911], [132, -35.354125976562], [138, -35.354125976562], [138, -25.995911],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 132°E to 138°E, 20°S to 24°S (SF53).
 * @internal
 */
class Extent2917
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [138, -20], [132, -20], [132, -24], [138, -24], [138, -20],
                ],
            ],
        ];
    }
}

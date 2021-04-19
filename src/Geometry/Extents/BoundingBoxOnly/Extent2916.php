<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 126°E to 132°E, 20°S to 24°S (SF52).
 * @internal
 */
class Extent2916
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132, -20], [126, -20], [126, -24], [132, -24], [132, -20],
                ],
            ],
        ];
    }
}

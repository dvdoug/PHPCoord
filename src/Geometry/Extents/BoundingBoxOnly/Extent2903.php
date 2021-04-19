<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 126°E to 132°E, 12°S to 16°S (SD52) onshore.
 * @internal
 */
class Extent2903
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132, -12], [126, -12], [126, -16], [132, -16], [132, -12],
                ],
            ],
        ];
    }
}

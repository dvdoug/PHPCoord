<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 126°E to 132°E, south of 28°S (SH52) onshore.
 * @internal
 */
class Extent2932
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132, -28], [126, -28], [126, -32.36580657959], [132, -32.36580657959], [132, -28],
                ],
            ],
        ];
    }
}

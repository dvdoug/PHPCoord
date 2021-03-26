<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 126°E to 132°E, 24°S to 28°S (SG52).
 * @internal
 */
class Extent2924
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132, -24], [126, -24], [126, -28], [132, -28], [132, -24],
                ],
            ],
        ];
    }
}

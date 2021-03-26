<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 120°E to 126°E, 20°S to 24°S (SF51).
 * @internal
 */
class Extent2915
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [126, -20], [120, -20], [120, -24], [126, -24], [126, -20],
                ],
            ],
        ];
    }
}

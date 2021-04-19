<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - FSU - 22.5°E to 25.5°E onshore.
 * @internal
 */
class Extent2654
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [25.5, 59.746996647991], [22.5, 59.746996647991], [22.5, 47.71314239502], [25.5, 47.71314239502], [25.5, 59.746996647991],
                ],
            ],
        ];
    }
}

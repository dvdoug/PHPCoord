<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 9°E to 10°E.
 * @internal
 */
class Extent3649
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [9.5479052423348, 64.229078249905], [9, 64.229078249905], [9, 63.873056154176], [9.5479052423348, 63.873056154176], [9.5479052423348, 64.229078249905],
                ],
            ],
            [
                [
                    [10, 64.247116605648], [9, 64.247116605648], [9, 58.449861026271], [10, 58.449861026271], [10, 64.247116605648],
                ],
            ],
        ];
    }
}

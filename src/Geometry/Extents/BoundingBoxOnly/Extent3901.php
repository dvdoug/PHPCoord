<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Germany - onshore west of 6°E.
 * @internal
 */
class Extent3901
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [6, 51.828187427115], [5.9520530700684, 51.828187427115], [5.9520530700684, 51.722028745747], [6, 51.722028745747], [6, 51.828187427115],
                ],
            ],
            [
                [
                    [6, 51.083500620373], [5.8649992942812, 51.083500620373], [5.8649992942812, 50.973117828369], [6, 50.973117828369], [6, 51.083500620373],
                ],
            ],
        ];
    }
}

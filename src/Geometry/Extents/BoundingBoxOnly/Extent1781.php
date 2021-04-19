<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 126°E to 132°E onshore.
 * @internal
 */
class Extent1781
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132, 73.60214805603], [126, 73.60214805603], [126, 47.66388130188], [132, 47.66388130188], [132, 73.60214805603],
                ],
            ],
            [
                [
                    [132, 45.345823287964], [130.41111946106, 45.345823287964], [130.41111946106, 42.256353378296], [132, 42.256353378296], [132, 45.345823287964],
                ],
            ],
        ];
    }
}

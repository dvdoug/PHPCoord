<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 130.5°E to 133.5°E onshore.
 * @internal
 */
class Extent2690
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [133.5, 71.989839553833], [130.5, 71.989839553833], [130.5, 47.66388130188], [133.5, 47.66388130188], [133.5, 71.989839553833],
                ],
            ],
            [
                [
                    [133.5, 45.855344064435], [130.5, 45.855344064435], [130.5, 42.256353378296], [133.5, 42.256353378296], [133.5, 45.855344064435],
                ],
            ],
        ];
    }
}

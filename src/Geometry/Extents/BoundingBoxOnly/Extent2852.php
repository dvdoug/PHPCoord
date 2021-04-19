<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Iceland - onshore 24°W to 18°W.
 * @internal
 */
class Extent2852
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-18, 66.510853719913], [-24, 66.510853719913], [-24, 63.345832665457], [-18, 63.345832665457], [-18, 66.510853719913],
                ],
            ],
        ];
    }
}

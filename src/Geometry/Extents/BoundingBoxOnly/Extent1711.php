<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - former Yugoslavia onshore 19.5°E to 22.5°E.
 * @internal
 */
class Extent1711
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [22.5, 46.18111038208], [19.5, 46.18111038208], [19.5, 40.855888366699], [22.5, 40.855888366699], [22.5, 46.18111038208],
                ],
            ],
        ];
    }
}

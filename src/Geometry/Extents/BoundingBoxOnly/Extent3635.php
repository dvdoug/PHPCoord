<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Mexico - east of 90°W.
 * @internal
 */
class Extent3635
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-84.641849578996, 25.761865297778], [-90, 25.761865297778], [-90, 17.818885803099], [-84.641849578996, 17.818885803099], [-84.641849578996, 25.761865297778],
                ],
            ],
        ];
    }
}

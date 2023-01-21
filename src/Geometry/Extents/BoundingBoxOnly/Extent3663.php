<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 21°E to 22°E.
 * @internal
 */
class Extent3663
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [22, 70.443170883137], [21, 70.443170883137], [21, 69.033325195313], [22, 69.033325195313], [22, 70.443170883137],
                ],
            ],
            [
                [
                    [22.000000274917, 70.721863836489], [21.780210113907, 70.721863836489], [21.780210113907, 70.434725962461], [22.000000274917, 70.434725962461], [22.000000274917, 70.721863836489],
                ],
            ],
        ];
    }
}

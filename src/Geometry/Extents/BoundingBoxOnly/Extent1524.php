<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Turkey - west of 28.5°E onshore.
 * @internal
 */
class Extent1524
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [28.5, 42.109992980957], [25.975657515935, 42.109992980957], [25.975657515935, 36.502874183543], [28.5, 36.502874183543], [28.5, 42.109992980957],
                ],
            ],
            [
                [
                    [26.077330916566, 40.289933724867], [25.621289524001, 40.289933724867], [25.621289524001, 40.043086032267], [26.077330916566, 40.043086032267], [26.077330916566, 40.289933724867],
                ],
            ],
        ];
    }
}

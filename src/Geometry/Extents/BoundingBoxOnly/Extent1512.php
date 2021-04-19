<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Germany - East Germany - west of 10.5°E.
 * @internal
 */
class Extent1512
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [10.5, 51.55838455952], [9.9222221374512, 51.55838455952], [9.9222221374512, 50.350271708807], [10.5, 50.350271708807], [10.5, 51.55838455952],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Germany - East Germany - west of 12°E.
 * @internal
 */
class Extent3575
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [12, 54.22610693981], [9.9222221374512, 54.22610693981], [9.9222221374512, 50.204719543457], [12, 50.204719543457], [12, 54.22610693981],
                ],
            ],
        ];
    }
}

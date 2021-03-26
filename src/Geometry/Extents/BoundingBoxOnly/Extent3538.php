<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Croatia - east of 18°E.
 * @internal
 */
class Extent3538
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [18.552363517, 42.760842826361], [18, 42.760842826361], [18, 41.622009155], [18.552363517, 41.622009155], [18.552363517, 42.760842826361],
                ],
            ],
            [
                [
                    [19.424997329712, 45.912963867188], [18, 45.912963867188], [18, 44.853328704834], [19.424997329712, 44.853328704834], [19.424997329712, 45.912963867188],
                ],
            ],
        ];
    }
}

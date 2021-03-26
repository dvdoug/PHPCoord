<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 10ºE to 11ºE.
 * @internal
 */
class Extent3650
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [11, 65.034339411127], [10.6148706789, 65.034339411127], [10.6148706789, 64.793751089304], [11, 64.793751089304], [11, 65.034339411127],
                ],
            ],
            [
                [
                    [11, 64.687485485327], [10, 64.687485485327], [10, 58.907898155781], [11, 58.907898155781], [11, 64.687485485327],
                ],
            ],
        ];
    }
}

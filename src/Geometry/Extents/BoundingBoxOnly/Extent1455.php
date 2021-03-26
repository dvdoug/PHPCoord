<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Africa/South Africa - west of 18°E.
 * @internal
 */
class Extent1455
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [18, -32.68267250061], [17.793466567993, -32.68267250061], [17.793466567993, -33.093751907349], [18, -33.093751907349], [18, -32.68267250061],
                ],
            ],
            [
                [
                    [18, -28.030349731445], [16.451303482056, -28.030349731445], [16.451303482056, -31.544469355472], [18, -31.544469355472], [18, -28.030349731445],
                ],
            ],
        ];
    }
}

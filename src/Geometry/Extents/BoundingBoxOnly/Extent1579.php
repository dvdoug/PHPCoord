<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Africa/Africa - Tanzania and Uganda - south of equator and west of 30°E.
 * @internal
 */
class Extent1579
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [30, 0], [29.57430267334, 0], [29.57430267334, -1.4761103391647], [30, -1.4761103391647], [30, 0],
                ],
            ],
            [
                [
                    [30, -4.288047813397], [29.340831756592, -4.288047813397], [29.340831756592, -6.8009351160044], [30, -6.8009351160044], [30, -4.288047813397],
                ],
            ],
        ];
    }
}

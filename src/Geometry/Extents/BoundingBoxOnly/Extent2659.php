<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - FSU - 37.5°E to 40.5°E onshore.
 * @internal
 */
class Extent2659
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [40.5, 68.798047683326], [37.5, 68.798047683326], [37.5, 66.003908157349], [40.5, 66.003908157349], [40.5, 68.798047683326],
                ],
            ],
            [
                [
                    [40.5, 65.930207913391], [37.5, 65.930207913391], [37.5, 43.078509277582], [40.5, 43.078509277582], [40.5, 65.930207913391],
                ],
            ],
        ];
    }
}

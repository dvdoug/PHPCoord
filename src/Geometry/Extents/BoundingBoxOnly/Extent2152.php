<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - 54°W to 48°W.
 * @internal
 */
class Extent2152
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-48, 57.644712897771], [-54, 57.644712897771], [-54, 39.5085003], [-48, 39.5085003], [-48, 57.644712897771],
                ],
            ],
        ];
    }
}

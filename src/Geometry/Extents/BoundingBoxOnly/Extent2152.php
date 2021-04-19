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
                    [-48, 57.644712897771], [-54, 57.644712897771], [-54, 43.27618515622], [-48, 43.27618515622], [-48, 57.644712897771],
                ],
            ],
        ];
    }
}

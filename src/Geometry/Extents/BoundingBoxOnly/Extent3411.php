<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - 132°W to 126°W.
 * @internal
 */
class Extent3411
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-126, 80.922905029812], [-132, 80.922905029812], [-132, 46.52972222], [-126, 46.52972222], [-126, 80.922905029812],
                ],
            ],
        ];
    }
}

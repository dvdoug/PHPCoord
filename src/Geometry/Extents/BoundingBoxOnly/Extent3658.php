<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 17°E to 18°E.
 * @internal
 */
class Extent3658
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [18, 69.950045462364], [17, 69.950045462364], [17, 67.945541381836], [18, 67.945541381836], [18, 69.950045462364],
                ],
            ],
        ];
    }
}

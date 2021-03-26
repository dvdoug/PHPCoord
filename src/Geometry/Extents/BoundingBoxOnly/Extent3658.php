<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 17ºE to 18ºE.
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
                    [18, 69.671297376127], [17, 69.671297376127], [17, 67.945541381836], [18, 67.945541381836], [18, 69.671297376127],
                ],
            ],
        ];
    }
}

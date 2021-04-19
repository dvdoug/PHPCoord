<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - east of 30ºE.
 * @internal
 */
class Extent3676
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [30.950830459595, 69.942310850432], [30, 69.942310850432], [30, 69.466743422258], [30.950830459595, 69.466743422258], [30.950830459595, 69.942310850432],
                ],
            ],
            [
                [
                    [31.218499048217, 70.760961023281], [30, 70.760961023281], [30, 70.015585592861], [31.218499048217, 70.015585592861], [31.218499048217, 70.760961023281],
                ],
            ],
        ];
    }
}

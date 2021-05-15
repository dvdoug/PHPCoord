<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 11°E to 12°E.
 * @internal
 */
class Extent3651
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [12, 65.754832281224], [11.642041065485, 65.754832281224], [11.642041065485, 65.533211725558], [12, 65.533211725558], [12, 65.754832281224],
                ],
            ],
            [
                [
                    [12, 65.29257144805], [11, 65.29257144805], [11, 58.88374710083], [12, 58.88374710083], [12, 65.29257144805],
                ],
            ],
        ];
    }
}

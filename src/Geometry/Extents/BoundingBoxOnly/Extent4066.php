<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 6°E to 12°E.
 * @internal
 */
class Extent4066
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [12, 65.29257144805], [6, 65.29257144805], [6, 57.93807588073], [12, 57.93807588073], [12, 65.29257144805],
                ],
            ],
            [
                [
                    [12, 65.754832281224], [11.642041065485, 65.754832281224], [11.642041065485, 65.533211725558], [12, 65.533211725558], [12, 65.754832281224],
                ],
            ],
        ];
    }
}

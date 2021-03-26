<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Germany - 6°E to 12°E.
 * @internal
 */
class Extent2861
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [12, 55.463544845766], [6, 55.463544845766], [6, 47.274719238281], [12, 47.274719238281], [12, 55.463544845766],
                ],
            ],
            [
                [
                    [8.7102546691895, 47.711036682129], [8.6739530563354, 47.711036682129], [8.6739530563354, 47.693344116211], [8.7102546691895, 47.693344116211], [8.7102546691895, 47.711036682129],
                ],
            ],
        ];
    }
}

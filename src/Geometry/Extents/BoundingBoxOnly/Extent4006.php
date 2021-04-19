<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Yemen - west of 42°E.
 * @internal
 */
class Extent4006
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [42, 16.357429544179], [41.082032538, 16.357429544179], [41.082032538, 14.737085507535], [42, 14.737085507535], [42, 16.357429544179],
                ],
            ],
        ];
    }
}

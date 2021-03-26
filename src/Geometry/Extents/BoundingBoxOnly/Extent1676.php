<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/India - north of 28°N.
 * @internal
 */
class Extent1676
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [81.632060152144, 35.501331329346], [71.905973738212, 35.501331329346], [71.905973738212, 28], [81.632060152144, 28], [81.632060152144, 35.501331329346],
                ],
            ],
            [
                [
                    [70.58537317366, 28.035543441773], [70.356417260667, 28.035543441773], [70.356417260667, 28], [70.58537317366, 28], [70.58537317366, 28.035543441773],
                ],
            ],
        ];
    }
}

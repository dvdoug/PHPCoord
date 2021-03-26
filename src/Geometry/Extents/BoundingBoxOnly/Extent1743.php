<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - zone III.
 * @internal
 */
class Extent1743
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [11.97295, 65.754832281224], [11.642041065485, 65.754832281224], [11.642041065485, 65.533211725558], [11.97295, 65.533211725558], [11.97295, 65.754832281224],
                ],
            ],
            [
                [
                    [11.97295, 65.252984435799], [9.55625, 65.252984435799], [9.55625, 58.846704496773], [11.97295, 58.846704496773], [11.97295, 65.252984435799],
                ],
            ],
        ];
    }
}

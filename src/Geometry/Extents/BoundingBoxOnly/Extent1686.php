<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Pakistan - onshore south of 28°N.
 * @internal
 */
class Extent1686
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [71.905973738212, 28], [70.58537317366, 28], [70.58537317366, 27.698400497437], [71.905973738212, 27.698400497437], [71.905973738212, 28],
                ],
            ],
            [
                [
                    [71.134101867676, 28], [61.591580237669, 28], [61.591580237669, 23.643277736247], [71.134101867676, 23.643277736247], [71.134101867676, 28],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Iran - FD58.
 * @internal
 */
class Extent1300
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [52.274831, 26.709803], [52.074963, 26.709803], [52.074963, 26.589953], [52.274831, 26.589953], [52.274831, 26.709803],
                ],
            ],
            [
                [
                    [50.415837065546, 29.380971714417], [50.226477158302, 29.380971714417], [50.226477158302, 29.168153274353], [50.415837065546, 29.168153274353], [50.415837065546, 29.380971714417],
                ],
            ],
            [
                [
                    [53.600516194492, 33.216252985291], [47.134485441049, 33.216252985291], [47.134485441049, 26.219711], [53.600516194492, 26.219711], [53.600516194492, 33.216252985291],
                ],
            ],
        ];
    }
}
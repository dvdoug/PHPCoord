<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 30°E to 36°E onshore.
 * @internal
 */
class Extent1765
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [36, 70.01092338562], [30, 70.01092338562], [30, 50.346937179565], [36, 50.346937179565], [36, 70.01092338562],
                ],
            ],
            [
                [
                    [35.986696243286, 65.239492416382], [35.402986526489, 65.239492416382], [35.402986526489, 64.918249130249], [35.986696243286, 64.918249130249], [35.986696243286, 65.239492416382],
                ],
            ],
        ];
    }
}

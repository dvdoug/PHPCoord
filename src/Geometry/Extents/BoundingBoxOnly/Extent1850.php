<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/UAE - Abu Dhabi - onshore west of 54°E.
 * @internal
 */
class Extent1850
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [54, 24.314291581997], [51.561678993903, 24.314291581997], [51.561678993903, 22.769686468669], [54, 22.769686468669], [54, 24.314291581997],
                ],
            ],
        ];
    }
}

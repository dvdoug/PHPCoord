<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - GoM - 95°W to 87.25°W.
 * @internal
 */
class Extent3359
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-87.25, 30.228155582779], [-95, 30.228155582779], [-95, 25.61629888984], [-87.25, 25.61629888984], [-87.25, 30.228155582779],
                ],
            ],
        ];
    }
}

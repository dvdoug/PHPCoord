<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents;

/**
 * Global/World (by country).
 * @internal
 */
class Extent2830
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-180, -90], [-180, 90], [180, 90], [180, -90], [-180, -90],
                ],
            ],
        ];
    }
}

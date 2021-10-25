<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents;

/**
 * Global/World - WGS72 BE to WGS 84 - by country.
 * @internal
 */
class Extent2346
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

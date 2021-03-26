<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - California - SPCS - 6.
 * @internal
 */
class Extent2180
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-114.42402919565, 34.078332057977], [-118.14653747371, 34.078332057977], [-118.14653747371, 32.53074836731], [-114.42402919565, 32.53074836731], [-114.42402919565, 34.078332057977],
                ],
            ],
        ];
    }
}

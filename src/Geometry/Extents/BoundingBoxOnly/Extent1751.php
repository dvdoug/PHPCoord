<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Peru - east of 73°W.
 * @internal
 */
class Extent1751
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-68.673904418945, -9.4099559783936], [-73, -9.4099559783936], [-73, -18.389513015747], [-68.673904418945, -18.389513015747], [-68.673904418945, -9.4099559783936],
                ],
            ],
            [
                [
                    [-69.947516273694, -2.1479167938232], [-73, -2.1479167938232], [-73, -5.7267360687255], [-69.947516273694, -5.7267360687255], [-69.947516273694, -2.1479167938232],
                ],
            ],
        ];
    }
}

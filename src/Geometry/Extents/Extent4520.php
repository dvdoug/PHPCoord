<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents;

/**
 * Global/World centred on 90°W.
 * @internal
 */
class Extent4520
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

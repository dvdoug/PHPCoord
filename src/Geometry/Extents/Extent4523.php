<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents;

/**
 * Global/World centred on 150°E.
 * @internal
 */
class Extent4523
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

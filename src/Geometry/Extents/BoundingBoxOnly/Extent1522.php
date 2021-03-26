<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Poland - 19.5°E to 22.5°E.
 * @internal
 */
class Extent1522
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [22.5, 54.547517791009], [19.5, 54.547517791009], [19.5, 49.098024443457], [22.5, 49.098024443457], [22.5, 54.547517791009],
                ],
            ],
        ];
    }
}

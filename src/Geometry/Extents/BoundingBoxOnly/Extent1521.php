<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Poland - 16.5°E to 19.5°E.
 * @internal
 */
class Extent1521
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [19.5, 55.921550168001], [16.5, 55.921550168001], [16.5, 49.391937255859], [19.5, 49.391937255859], [19.5, 55.921550168001],
                ],
            ],
        ];
    }
}

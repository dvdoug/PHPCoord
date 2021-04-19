<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - former Yugoslavia onshore 16.5°E to 19.5°E.
 * @internal
 */
class Extent1710
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [19.5, 46.54695398058], [16.5, 46.54695398058], [16.5, 41.798965608233], [19.5, 41.798965608233], [19.5, 46.54695398058],
                ],
            ],
        ];
    }
}

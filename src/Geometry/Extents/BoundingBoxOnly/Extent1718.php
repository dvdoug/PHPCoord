<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Italy - west of 12°E.
 * @internal
 */
class Extent1718
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [12, 47.039962996685], [5.9349995059937, 47.039962996685], [5.9349995059937, 37.055292100907], [12, 37.055292100907], [12, 47.039962996685],
                ],
            ],
            [
                [
                    [12, 37.041626150001], [11.668297511, 37.041626150001], [11.668297511, 36.531407117834], [12, 36.531407117834], [12, 37.041626150001],
                ],
            ],
        ];
    }
}

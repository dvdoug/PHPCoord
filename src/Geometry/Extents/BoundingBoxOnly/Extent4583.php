<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/UK - Liverpool to Leeds.
 * @internal
 */
class Extent4583
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-1.35, 53.89583333], [-3.138386, 53.89583333], [-3.138386, 53.325], [-1.35, 53.325], [-1.35, 53.89583333],
                ],
            ],
        ];
    }
}

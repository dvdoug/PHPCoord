<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 66°W to 60°W, S hemisphere and SAD69 by country.
 * @internal
 */
class Extent3840
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-61.796045303345, -39.037691116333], [-62.1620388031, -39.037691116333], [-62.1620388031, -39.293502807617], [-61.796045303345, -39.293502807617], [-61.796045303345, -39.037691116333],
                ],
            ],
            [
                [
                    [-59.999999999994, 5.2727079388374], [-66, 5.2727079388374], [-66, -45], [-59.999999999994, -45], [-59.999999999994, 5.2727079388374],
                ],
            ],
        ];
    }
}

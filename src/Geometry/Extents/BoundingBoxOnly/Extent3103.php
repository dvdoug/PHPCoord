<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Finland - 29.5°E to 30.5°E.
 * @internal
 */
class Extent3103
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [30.5, 66.520619663536], [29.5, 66.520619663536], [29.5, 61.437970372677], [30.5, 61.437970372677], [30.5, 66.520619663536],
                ],
            ],
            [
                [
                    [30.028610229493, 67.970172597176], [29.5, 67.970172597176], [29.5, 67.275832103949], [30.028610229493, 67.275832103949], [30.028610229493, 67.970172597176],
                ],
            ],
        ];
    }
}

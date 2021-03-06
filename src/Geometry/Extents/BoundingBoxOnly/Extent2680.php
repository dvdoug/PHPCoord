<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 100.5°E to 103.5°E onshore.
 * @internal
 */
class Extent2680
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [103.5, 79.479467391968], [100.5, 79.479467391968], [100.5, 77.97489884366], [103.5, 77.97489884366], [103.5, 79.479467391968],
                ],
            ],
            [
                [
                    [103.5, 77.706426620484], [100.5, 77.706426620484], [100.5, 50.178924502908], [103.5, 50.178924502908], [103.5, 77.706426620484],
                ],
            ],
            [
                [
                    [100.57043647766, 79.701054359624], [100.5, 79.701054359624], [100.5, 79.633539795799], [100.57043647766, 79.633539795799], [100.57043647766, 79.701054359624],
                ],
            ],
        ];
    }
}

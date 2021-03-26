<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/France - mainland - 47°N to 49°N.
 * @internal
 */
class Extent3551
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [8.2260780334473, 49], [-4.8653622509834, 49], [-4.8653622509834, 47], [8.2260780334473, 47], [8.2260780334473, 49],
                ],
            ],
            [
                [
                    [-2.9901630472168, 47.441319870419], [-3.3331158959584, 47.441319870419], [-3.3331158959584, 47.238112743907], [-2.9901630472168, 47.238112743907], [-2.9901630472168, 47.441319870419],
                ],
            ],
        ];
    }
}

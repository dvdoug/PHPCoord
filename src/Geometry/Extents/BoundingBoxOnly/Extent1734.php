<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/France - mainland 45.45°N to 48.15°N. Also all mainland..
 * @internal
 */
class Extent1734
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-2.9901630472168, 47.441319870419], [-3.3331158959584, 47.441319870419], [-3.3331158959584, 47.238112743907], [-2.9901630472168, 47.238112743907], [-2.9901630472168, 47.441319870419],
                ],
            ],
            [
                [
                    [8.2260780334474, 51.135801649689], [-4.8653622509834, 51.135801649689], [-4.8653622509834, 42.332912445069], [8.2260780334474, 42.332912445069], [8.2260780334474, 51.135801649689],
                ],
            ],
        ];
    }
}

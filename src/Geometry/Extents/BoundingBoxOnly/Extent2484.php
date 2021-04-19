<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 35°20'N to 36°N; 135°E to 136°E.
 * @internal
 */
class Extent2484
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [136, 35.999466666667], [135.89901975649, 35.999466666667], [135.89901975649, 35.807505519928], [136, 35.807505519928], [136, 35.999466666667],
                ],
            ],
            [
                [
                    [136, 35.811707642998], [135, 35.811707642998], [135, 35.332766666667], [136, 35.332766666667], [136, 35.811707642998],
                ],
            ],
        ];
    }
}

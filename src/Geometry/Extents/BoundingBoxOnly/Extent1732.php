<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/France - mainland 45.45°N to 48.15°N.
 * @internal
 */
class Extent1732
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
                    [7.6231942176819, 48.15], [-4.7967470465714, 48.15], [-4.7967470465714, 45.45], [7.6231942176819, 45.45], [7.6231942176819, 48.15],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 90°W to 84°W onshore.
 * @internal
 */
class Extent3862
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-83.999729090038, 48.312210083008], [-90, 48.312210083008], [-90, 28.854289941421], [-83.999729090038, 28.854289941421], [-83.999729090038, 48.312210083008],
                ],
            ],
        ];
    }
}

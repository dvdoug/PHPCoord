<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Quebec and Labrador - 66°W to 63°W.
 * @internal
 */
class Extent2277
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-63, 60.512379757438], [-66, 60.512379757438], [-66, 50.180137805819], [-63, 50.180137805819], [-63, 60.512379757438],
                ],
            ],
            [
                [
                    [-63, 49.998906270732], [-64.589723612344, 49.998906270732], [-64.589723612344, 49.158708810278], [-63, 49.158708810278], [-63, 49.998906270732],
                ],
            ],
            [
                [
                    [-64.082071639563, 49.310955687418], [-66, 49.310955687418], [-66, 47.952771576504], [-64.082071639563, 47.952771576504], [-64.082071639563, 49.310955687418],
                ],
            ],
        ];
    }
}
<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 90°W to 84°W and GoM OCS.
 * @internal
 */
class Extent3641
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-83.919910977101, 48.312210083008], [-90.00129621883, 48.312210083008], [-90.00129621883, 23.957365881073], [-83.919910977101, 23.957365881073], [-83.919910977101, 48.312210083008],
                ],
            ],
        ];
    }
}

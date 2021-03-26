<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 78°W to 72°W, N hemisphere and PSAD56 by country.
 * @internal
 */
class Extent1756
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-75.53031539917, 0.90430641174328], [-78, 0.90430641174328], [-78, 0], [-75.53031539917, 0], [-75.53031539917, 0.90430641174328],
                ],
            ],
            [
                [
                    [-72, 11.614625930786], [-73.378067016602, 11.614625930786], [-73.378067016602, 7.0219554901123], [-72, 7.0219554901123], [-72, 11.614625930786],
                ],
            ],
        ];
    }
}

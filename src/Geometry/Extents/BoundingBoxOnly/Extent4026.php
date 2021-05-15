<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Brazil - 66°W to 60°W.
 * @internal
 */
class Extent4026
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, 5.2727069854737], [-66, 5.2727069854737], [-66, -16.270225524902], [-60, -16.270225524902], [-60, 5.2727069854737],
                ],
            ],
        ];
    }
}

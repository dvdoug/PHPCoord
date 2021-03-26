<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/France - mainland north of 48.15°N.
 * @internal
 */
class Extent1731
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [8.2260780334473, 51.135801649689], [-4.8653622509834, 51.135801649689], [-4.8653622509834, 48.15], [8.2260780334473, 48.15], [8.2260780334473, 51.135801649689],
                ],
            ],
        ];
    }
}

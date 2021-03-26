<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australasia - Australia and Norfolk Island - 162°E to 168°E.
 * @internal
 */
class Extent4175
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [164.69123315099, -52.22585913276], [162, -52.22585913276], [162, -59.381099276603], [164.69123315099, -59.381099276603], [164.69123315099, -52.22585913276],
                ],
            ],
            [
                [
                    [168, -25.942013537378], [162, -25.942013537378], [162, -37.180451987545], [168, -37.180451987545], [168, -25.942013537378],
                ],
            ],
        ];
    }
}

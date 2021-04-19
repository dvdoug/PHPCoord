<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Africa/Madagascar - nearshore - east of 48°E.
 * @internal
 */
class Extent1849
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [51.0267297728, -14.8923029056], [48, -14.8923029056], [48, -24.2095472336], [51.0267297728, -24.2095472336], [51.0267297728, -14.8923029056],
                ],
            ],
            [
                [
                    [50.2031059648, -11.690465352], [48, -11.690465352], [48, -13.7606106384], [50.2031059648, -13.7606106384], [50.2031059648, -11.690465352],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Fiji - main islands - east of 180°.
 * @internal
 */
class Extent3400
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-179.771105, -16.62989], [-180, -16.62989], [-180, -17.031887], [-179.771105, -17.031887], [-179.771105, -16.62989],
                ],
            ],
            [
                [
                    [-179.949999, -16.104694], [-180, -16.104694], [-180, -16.230057], [-179.949999, -16.230057], [-179.949999, -16.104694],
                ],
            ],
        ];
    }
}

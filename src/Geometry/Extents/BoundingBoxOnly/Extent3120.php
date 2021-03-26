<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/French Polynesia - west of 150°W.
 * @internal
 */
class Extent3120
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-150, -12.507757896], [-158.128055647, -12.507757896], [-158.128055647, -26.696883824], [-150, -26.696883824], [-150, -12.507757896],
                ],
            ],
        ];
    }
}

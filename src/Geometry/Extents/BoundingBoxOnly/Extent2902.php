<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 120°E to 126°E, 12°S to 16°S (SD51) onshore.
 * @internal
 */
class Extent2902
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [126, -13.879355541768], [124.17259020013, -13.879355541768], [124.17259020013, -16], [126, -16], [126, -13.879355541768],
                ],
            ],
        ];
    }
}

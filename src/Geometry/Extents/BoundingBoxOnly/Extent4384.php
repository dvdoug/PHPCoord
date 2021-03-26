<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Papua New Guinea - 0°N to 12°S and 140°E to 158°E.
 * @internal
 */
class Extent4384
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [158, 5.6843418860808E-14], [140, 5.6843418860808E-14], [140, -12], [158, -12], [158, 5.6843418860808E-14],
                ],
            ],
        ];
    }
}

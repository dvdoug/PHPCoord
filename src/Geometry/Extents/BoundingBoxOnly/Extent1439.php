<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Ontario - west of 90°W.
 * @internal
 */
class Extent1439
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-90, 56.199516963567], [-95.157722473145, 56.199516963567], [-95.157722473145, 48.031912562541], [-90, 48.031912562541], [-90, 56.199516963567],
                ],
            ],
        ];
    }
}

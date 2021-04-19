<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 108°W to 102°W.
 * @internal
 */
class Extent3500
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-102, 49.000276565552], [-108, 49.000276565552], [-108, 28.9840259552], [-102, 28.9840259552], [-102, 49.000276565552],
                ],
            ],
        ];
    }
}

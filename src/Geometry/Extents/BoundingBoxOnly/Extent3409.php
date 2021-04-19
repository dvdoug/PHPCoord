<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - 144°W to 138°W.
 * @internal
 */
class Extent3409
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-138, 72.523638584058], [-141.00299072266, 72.523638584058], [-141.00299072266, 59.455011857329], [-138, 59.455011857329], [-138, 72.523638584058],
                ],
            ],
            [
                [
                    [-138, 53.607138274371], [-138.755283629, 53.607138274371], [-138.755283629, 52.059228809204], [-138, 52.059228809204], [-138, 53.607138274371],
                ],
            ],
        ];
    }
}

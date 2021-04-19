<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - 126°W to 120°W.
 * @internal
 */
class Extent3412
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-120, 81.798763834903], [-126, 81.798763834903], [-126, 48.136872450614], [-120, 48.136872450614], [-120, 81.798763834903],
                ],
            ],
        ];
    }
}

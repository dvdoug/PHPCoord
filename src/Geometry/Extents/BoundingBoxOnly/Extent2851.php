<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Iceland - mainland west of 24°W.
 * @internal
 */
class Extent2851
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-24, 65.850278603029], [-24.658475988579, 65.850278603029], [-24.658475988579, 65.367538539477], [-24, 65.367538539477], [-24, 65.850278603029],
                ],
            ],
            [
                [
                    [-24, 64.95604747346], [-24.176862518587, 64.95604747346], [-24.176862518587, 64.715071270723], [-24, 64.715071270723], [-24, 64.95604747346],
                ],
            ],
        ];
    }
}

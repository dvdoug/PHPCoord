<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Iraq - 33°N to 34.6°N, 40.1°E to 42°E (map 9).
 * @internal
 */
class Extent3723
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [42, 34.593912932015], [40.070261288128, 34.593912932015], [40.070261288128, 32.950731242772], [42, 32.950731242772], [42, 34.593912932015],
                ],
            ],
        ];
    }
}

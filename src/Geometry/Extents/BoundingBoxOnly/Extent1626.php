<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Germany - West Germany - 10.5°E to 13.5°E.
 * @internal
 */
class Extent1626
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [13.5, 50.522216796875], [10.5, 50.522216796875], [10.5, 47.39527130127], [13.5, 47.39527130127], [13.5, 50.522216796875],
                ],
            ],
            [
                [
                    [11.582311630249, 54.584508937875], [10.5, 54.584508937875], [10.5, 51.55838455952], [11.582311630249, 51.55838455952], [11.582311630249, 54.584508937875],
                ],
            ],
        ];
    }
}

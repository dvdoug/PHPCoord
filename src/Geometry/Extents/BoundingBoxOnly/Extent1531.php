<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Maritime Provinces - west of 66°W.
 * @internal
 */
class Extent1531
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-66, 48.069330744327], [-69, 48.069330744327], [-69, 45.006378216293], [-66, 45.006378216293], [-66, 48.069330744327],
                ],
            ],
            [
                [
                    [-66, 44.636712402832], [-66.273868827213, 44.636712402832], [-66.273868827213, 43.642265706373], [-66, 43.642265706373], [-66, 44.636712402832],
                ],
            ],
            [
                [
                    [-66.664550725716, 44.857487925904], [-66.973382091638, 44.857487925904], [-66.973382091638, 44.565537651446], [-66.664550725716, 44.565537651446], [-66.664550725716, 44.857487925904],
                ],
            ],
        ];
    }
}
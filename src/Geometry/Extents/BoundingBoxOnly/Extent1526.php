<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Turkey - 31.5°E to 34.5°E onshore.
 * @internal
 */
class Extent1526
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [34.5, 42.069545751283], [31.5, 42.069545751283], [31.5, 35.979123938463], [34.5, 35.979123938463], [34.5, 42.069545751283],
                ],
            ],
        ];
    }
}

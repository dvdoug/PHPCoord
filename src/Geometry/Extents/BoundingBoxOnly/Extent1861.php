<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - zone VIII.
 * @internal
 */
class Extent1861
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [138.64437300566, 38.370658987088], [138.14688914359, 38.370658987088], [138.14688914359, 37.744441552432], [138.64437300566, 37.744441552432], [138.64437300566, 38.370658987088],
                ],
            ],
            [
                [
                    [139.902099, 38.573418694456], [137.329285, 38.573418694456], [137.329285, 34.543894602319], [139.902099, 34.543894602319], [139.902099, 38.573418694456],
                ],
            ],
        ];
    }
}

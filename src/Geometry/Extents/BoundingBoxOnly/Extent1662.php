<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Indonesia - 132°E to 138°E, S hemisphere.
 * @internal
 */
class Extent1662
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [138, 0], [132, 0], [132, -10.055179481487], [138, -10.055179481487], [138, 0],
                ],
            ],
        ];
    }
}

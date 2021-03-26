<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 12°E to 18°E onshore and S-42(58) by country.
 * @internal
 */
class Extent1792
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [18, 54.881653064808], [12, 54.881653064808], [12, 45.783882141113], [18, 45.783882141113], [18, 54.881653064808],
                ],
            ],
        ];
    }
}

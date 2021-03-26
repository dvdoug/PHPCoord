<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 16.5°E to 19.5°E onshore and S-42(83) by country.
 * @internal
 */
class Extent3582
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [19.5, 50.440132141113], [16.5, 50.440132141113], [16.5, 45.748329162598], [19.5, 45.748329162598], [19.5, 50.440132141113],
                ],
            ],
        ];
    }
}

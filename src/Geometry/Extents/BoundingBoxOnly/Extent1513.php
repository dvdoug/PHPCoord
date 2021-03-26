<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 10.5°E to 13.5°E onshore by country.
 * @internal
 */
class Extent1513
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [13.5, 54.732431145027], [10.5, 54.732431145027], [10.5, 48.975552020074], [13.5, 48.975552020074], [13.5, 54.732431145027],
                ],
            ],
        ];
    }
}

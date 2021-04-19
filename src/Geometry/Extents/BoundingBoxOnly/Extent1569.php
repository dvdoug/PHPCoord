<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Saudi Arabia - onshore 36°E to 42°E.
 * @internal
 */
class Extent1569
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [42, 32.154941558838], [36, 32.154941558838], [36, 17.657240266353], [42, 17.657240266353], [42, 32.154941558838],
                ],
            ],
            [
                [
                    [42, 17.059273107938], [41.70150802722, 17.059273107938], [41.70150802722, 16.593786326718], [42, 16.593786326718], [42, 17.059273107938],
                ],
            ],
        ];
    }
}

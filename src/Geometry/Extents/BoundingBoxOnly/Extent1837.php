<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 36°W to 30°W.
 * @internal
 */
class Extent1837
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-30, 0], [-36, 0], [-36, -20.104112625122], [-30, -20.104112625122], [-30, 0],
                ],
            ],
        ];
    }
}

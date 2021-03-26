<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Africa/French Southern Territories - 72°E to 78°E.
 * @internal
 */
class Extent4251
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [75.65373657, -45.764390250427], [72, -45.764390250427], [72, -51.186038138053], [75.65373657, -51.186038138053], [75.65373657, -45.764390250427],
                ],
            ],
            [
                [
                    [78, -34.477818916], [73.240396568, -34.477818916], [73.240396568, -42.070581923], [78, -42.070581923], [78, -34.477818916],
                ],
            ],
        ];
    }
}

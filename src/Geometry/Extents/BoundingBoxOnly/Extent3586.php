<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 22.5°E to 25.5°E onshore and S-42(83) by country.
 * @internal
 */
class Extent3586
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [22.894804000854, 48.245500385548], [22.5, 48.245500385548], [22.5, 47.767078399658], [22.894804000854, 47.767078399658], [22.894804000854, 48.245500385548],
                ],
            ],
            [
                [
                    [22.558052062988, 49.098024443457], [22.5, 49.098024443457], [22.5, 48.973304594648], [22.558052062988, 48.973304594648], [22.558052062988, 49.098024443457],
                ],
            ],
        ];
    }
}

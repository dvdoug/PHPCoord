<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Chile - onshore 26°S to 36°S.
 * @internal
 */
class Extent4222
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-68.287788391113, -26], [-72.861013200636, -26], [-72.861013200636, -36], [-68.287788391113, -36], [-68.287788391113, -26],
                ],
            ],
        ];
    }
}

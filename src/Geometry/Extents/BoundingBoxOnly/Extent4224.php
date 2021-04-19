<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Chile - onshore 32°S to 36°S.
 * @internal
 */
class Extent4224
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-69.774932861328, -32], [-72.861013200636, -32], [-72.861013200636, -36], [-69.774932861328, -36], [-69.774932861328, -32],
                ],
            ],
        ];
    }
}

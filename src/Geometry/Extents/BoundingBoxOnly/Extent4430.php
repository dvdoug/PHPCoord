<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Ukraine - 28°E to 31°E onshore.
 * @internal
 */
class Extent4430
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [31, 52.081279710901], [28, 52.081279710901], [28, 45.180633146895], [31, 45.180633146895], [31, 52.081279710901],
                ],
            ],
        ];
    }
}

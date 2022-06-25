<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 156°E to 162°E including Macquarie.
 * @internal
 */
class Extent4196
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [162, -14.081677431735], [156, -14.081677431735], [156, -37.93361383], [162, -37.93361383], [162, -14.081677431735],
                ],
            ],
            [
                [
                    [162, -51.027344444], [156, -51.027344444], [156, -60.5535836], [162, -60.5535836], [162, -51.027344444],
                ],
            ],
        ];
    }
}

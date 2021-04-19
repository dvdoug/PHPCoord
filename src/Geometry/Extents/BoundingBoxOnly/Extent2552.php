<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Africa/Africa - AEF 9°E to 14°E.
 * @internal
 */
class Extent2552
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [14, 11.275138378143], [8.4523414768613, 11.275138378143], [8.4523414768613, -5.0549634886659], [14, -5.0549634886659], [14, 11.275138378143],
                ],
            ],
            [
                [
                    [14, 23.522304534912], [9, 23.522304534912], [9, 12.802434921265], [14, 12.802434921265], [14, 23.522304534912],
                ],
            ],
        ];
    }
}

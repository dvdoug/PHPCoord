<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 10°E to 11°E.
 * @internal
 */
class Extent3650
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [11, 65.087816430625], [10, 65.087816430625], [10, 58.900334671849], [11, 58.900334671849], [11, 65.087816430625],
                ],
            ],
            [
                [
                    [11, 65.268851178741], [10.826477630454, 65.268851178741], [10.826477630454, 65.146398363949], [11, 65.146398363949], [11, 65.268851178741],
                ],
            ],
        ];
    }
}

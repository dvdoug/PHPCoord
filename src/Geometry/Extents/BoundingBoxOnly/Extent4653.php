<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Papua New Guinea - 156°E to 162°E.
 * @internal
 */
class Extent4653
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [157.600833647, -9.9137342876718], [156, -9.9137342876718], [156, -14.255817437356], [157.600833647, -14.255817437356], [157.600833647, -9.9137342876718],
                ],
            ],
            [
                [
                    [162, -1.1139548849998], [156, -1.1139548849998], [156, -6.7226455982311], [162, -6.7226455982311], [162, -1.1139548849998],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - EEZ east of 162°E.
 * @internal
 */
class Extent1566
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [163.192086652, -27.255378549098], [162, -27.255378549098], [162, -34.217735297371], [163.192086652, -34.217735297371], [163.192086652, -27.255378549098],
                ],
            ],
        ];
    }
}

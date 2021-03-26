<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Poland - west of 16.5°E.
 * @internal
 */
class Extent1520
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [16.5, 55.345944529044], [14.147637367248, 55.345944529044], [14.147637367248, 50.268193511631], [16.5, 50.268193511631], [16.5, 55.345944529044],
                ],
            ],
        ];
    }
}

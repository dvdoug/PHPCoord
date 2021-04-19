<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 138°W to 132°W.
 * @internal
 */
class Extent3495
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-137.56888771057, 73.031949143183], [-138, 73.031949143183], [-138, 72.523638942806], [-137.56888771057, 72.523638942806], [-137.56888771057, 73.031949143183],
                ],
            ],
            [
                [
                    [-132, 59.801935195923], [-138, 59.801935195923], [-138, 53.607139110395], [-132, 53.607139110395], [-132, 59.801935195923],
                ],
            ],
        ];
    }
}

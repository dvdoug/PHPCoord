<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Asia - FSU onshore 66°E to 72°E.
 * @internal
 */
class Extent1801
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [72, 73.565618515015], [66, 73.565618515015], [66, 36.671844482422], [72, 36.671844482422], [72, 73.565618515015],
                ],
            ],
            [
                [
                    [69.144041061401, 77.061800003052], [66, 77.061800003052], [66, 75.895934916319], [69.144041061401, 75.895934916319], [69.144041061401, 77.061800003052],
                ],
            ],
        ];
    }
}

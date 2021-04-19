<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 66°E to 72°E onshore.
 * @internal
 */
class Extent1771
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [72, 73.565618515015], [66, 73.565618515015], [66, 54.103326797485], [72, 54.103326797485], [72, 73.565618515015],
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

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Brazil - 42°W to 36°W and Aratu.
 * @internal
 */
class Extent1574
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-36, -8.3967514038086], [-42, -8.3967514038086], [-42, -26.346200942993], [-36, -26.346200942993], [-36, -8.3967514038086],
                ],
            ],
            [
                [
                    [-36, 0.00075340270990409], [-42.000003814697, 0.00075340270990409], [-42.000003814697, -5.1111106872559], [-36, -5.1111106872559], [-36, 0.00075340270990409],
                ],
            ],
        ];
    }
}

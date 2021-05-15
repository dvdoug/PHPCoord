<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Italy - 6°22'E to 18°40'E and north of 35°16'N; San Marino, Vatican City State.
 * @internal
 */
class Extent4619
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [18.666666666667, 47.094581604004], [6.3666666666668, 47.094581604004], [6.3666666666668, 35.266666666667], [18.666666666667, 35.266666666667], [18.666666666667, 47.094581604004],
                ],
            ],
        ];
    }
}

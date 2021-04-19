<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/French Guiana - west of 54°W.
 * @internal
 */
class Extent3145
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-54, 3.4597110748292], [-54.603782653809, 3.4597110748292], [-54.603782653809, 2.1134738922119], [-54, 2.1134738922119], [-54, 3.4597110748292],
                ],
            ],
            [
                [
                    [-54, 5.6894054412843], [-54.477779388428, 5.6894054412843], [-54.477779388428, 3.6297092437745], [-54, 3.6297092437745], [-54, 5.6894054412843],
                ],
            ],
        ];
    }
}

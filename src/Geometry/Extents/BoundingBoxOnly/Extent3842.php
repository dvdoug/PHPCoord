<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Brazil - east of 30°W.
 * @internal
 */
class Extent3842
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-25.284845352173, -17.136337280273], [-30, -17.136337280273], [-30, -23.857860565185], [-25.284845352173, -23.857860565185], [-25.284845352173, -17.136337280273],
                ],
            ],
            [
                [
                    [-26.00968170166, 4.2522640228271], [-30, 4.2522640228271], [-30, -6.1636753082275], [-26.00968170166, -6.1636753082275], [-26.00968170166, 4.2522640228271],
                ],
            ],
        ];
    }
}

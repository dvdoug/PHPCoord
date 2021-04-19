<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Honduras - onshore north of 14°38'30"N.
 * @internal
 */
class Extent3848
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-83.085669588724, 16.071735663443], [-89.223060608061, 16.071735663443], [-89.223060608061, 14.641667], [-83.085669588724, 14.641667], [-83.085669588724, 16.071735663443],
                ],
            ],
            [
                [
                    [-86.212754271182, 16.485944768305], [-86.684970590137, 16.485944768305], [-86.684970590137, 16.220144758943], [-86.212754271182, 16.220144758943], [-86.212754271182, 16.485944768305],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 157.5°E to 160.5°E onshore.
 * @internal
 */
class Extent2699
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [160.5, 70.978859158596], [160.25502967834, 70.978859158596], [160.25502967834, 70.767892919162], [160.5, 70.767892919162], [160.5, 70.978859158596],
                ],
            ],
            [
                [
                    [160.5, 71.117755042176], [157.5, 71.117755042176], [157.5, 60.542200088501], [160.5, 60.542200088501], [160.5, 71.117755042176],
                ],
            ],
            [
                [
                    [160.5, 59.604862227466], [157.5, 59.604862227466], [157.5, 51.369726247396], [160.5, 51.369726247396], [160.5, 59.604862227466],
                ],
            ],
        ];
    }
}
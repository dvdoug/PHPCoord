<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 24°E to 30°E onshore and S-42(58) by country.
 * @internal
 */
class Extent3579
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [29.730804539309, 48.263885498047], [24, 48.263885498047], [24, 41.243049621582], [29.730804539309, 41.243049621582], [29.730804539309, 48.263885498047],
                ],
            ],
            [
                [
                    [24.111385345459, 50.752607232285], [24, 50.752607232285], [24, 50.413448279064], [24.111385345459, 50.413448279064], [24.111385345459, 50.752607232285],
                ],
            ],
            [
                [
                    [24.143468856812, 50.922765408328], [24, 50.922765408328], [24, 50.829437255859], [24.143468856812, 50.829437255859], [24.143468856812, 50.922765408328],
                ],
            ],
        ];
    }
}
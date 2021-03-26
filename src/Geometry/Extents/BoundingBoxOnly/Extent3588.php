<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 28.5°E to 31.5°E onshore and S-42(58) by country.
 * @internal
 */
class Extent3588
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [29.730804539309, 45.439022064209], [28.5, 45.439022064209], [28.5, 43.3454093144], [29.730804539309, 43.3454093144], [29.730804539309, 45.439022064209],
                ],
            ],
        ];
    }
}

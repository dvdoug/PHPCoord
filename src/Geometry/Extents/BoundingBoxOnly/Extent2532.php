<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Denmark - onshore Zealand and Lolland.
 * @internal
 */
class Extent2532
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [12.688648949465, 56.178778597118], [10.791359280915, 56.178778597118], [10.791359280915, 54.512013512674], [12.688648949465, 54.512013512674], [12.688648949465, 56.178778597118],
                ],
            ],
            [
                [
                    [11.710453826965, 56.788660663003], [11.454431877958, 56.788660663003], [11.454431877958, 56.636484491744], [11.710453826965, 56.636484491744], [11.710453826965, 56.788660663003],
                ],
            ],
        ];
    }
}

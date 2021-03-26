<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 150°E to 156°E, 20°S to 24°S (SF56) onshore.
 * @internal
 */
class Extent2920
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [151.81348954125, -22.000647739079], [150, -22.000647739079], [150, -24], [151.81348954125, -24], [151.81348954125, -22.000647739079],
                ],
            ],
        ];
    }
}

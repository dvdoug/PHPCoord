<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/New Zealand - nearshore east of 174°E.
 * @internal
 */
class Extent3972
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [174.78926277161, -36.391570425183], [174, -36.391570425183], [174, -39.022023276961], [174.78926277161, -39.022023276961], [174.78926277161, -36.391570425183],
                ],
            ],
            [
                [
                    [179.26486223854, -34.247922816775], [174, -34.247922816775], [174, -44.122123376426], [179.26486223854, -44.122123376426], [179.26486223854, -34.247922816775],
                ],
            ],
        ];
    }
}

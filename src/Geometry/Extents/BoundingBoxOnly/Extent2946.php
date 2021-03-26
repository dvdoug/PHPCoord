<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 150°E to 156°E, 36°S to 40°S (SJ56) onshore.
 * @internal
 */
class Extent2946
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [150.21567109392, -36], [150, -36], [150, -36.867717183112], [150.21567109392, -36.867717183112], [150.21567109392, -36],
                ],
            ],
            [
                [
                    [150.0819683075, -37.089074522895], [150, -37.089074522895], [150, -37.566803151784], [150.0819683075, -37.566803151784], [150.0819683075, -37.089074522895],
                ],
            ],
        ];
    }
}

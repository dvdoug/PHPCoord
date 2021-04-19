<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 169.5°E to 172.5°E onshore.
 * @internal
 */
class Extent2703
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [172.5, 70.180543899536], [169.5, 70.180543899536], [169.5, 59.863718032837], [172.5, 59.863718032837], [172.5, 70.180543899536],
                ],
            ],
            [
                [
                    [169.59978294373, 69.906092612343], [169.5, 69.906092612343], [169.5, 69.72655598864], [169.59978294373, 69.72655598864], [169.59978294373, 69.906092612343],
                ],
            ],
        ];
    }
}

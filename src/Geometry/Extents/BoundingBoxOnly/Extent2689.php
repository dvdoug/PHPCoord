<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 127.5°E to 130.5°E onshore.
 * @internal
 */
class Extent2689
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [130.5, 73.589014053345], [127.5, 73.589014053345], [127.5, 48.855024353613], [130.5, 48.855024353613], [130.5, 73.589014053345],
                ],
            ],
            [
                [
                    [130.5, 42.775848373413], [130.41111946106, 42.775848373413], [130.41111946106, 42.679162979126], [130.5, 42.679162979126], [130.5, 42.775848373413],
                ],
            ],
        ];
    }
}

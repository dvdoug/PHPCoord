<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - offshore north of 65°N; Svalbard.
 * @internal
 */
class Extent2332
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [38, 84.722623821813], [-3.3437137437567, 84.722623821813], [-3.3437137437567, 65], [38, 65], [38, 84.722623821813],
                ],
            ],
        ];
    }
}

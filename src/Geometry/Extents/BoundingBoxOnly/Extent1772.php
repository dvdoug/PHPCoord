<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 72°E to 78°E onshore.
 * @internal
 */
class Extent1772
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [78, 73.181074142456], [72, 73.181074142456], [72, 53.176116814114], [78, 53.176116814114], [78, 73.181074142456],
                ],
            ],
            [
                [
                    [73.786066055298, 71.435658157397], [72, 71.435658157397], [72, 66.971514732137], [73.786066055298, 66.971514732137], [73.786066055298, 71.435658157397],
                ],
            ],
            [
                [
                    [73.040109634399, 72.895835281178], [72, 72.895835281178], [72, 71.508755532123], [73.040109634399, 71.508755532123], [73.040109634399, 72.895835281178],
                ],
            ],
            [
                [
                    [78, 72.681230545044], [76.694513320923, 72.681230545044], [76.694513320923, 72.013185501099], [78, 72.013185501099], [78, 72.681230545044],
                ],
            ],
            [
                [
                    [76.90431022644, 73.265588760376], [75.954778671265, 73.265588760376], [75.954778671265, 73.079923629761], [76.90431022644, 73.079923629761], [76.90431022644, 73.265588760376],
                ],
            ],
            [
                [
                    [76.935106277466, 73.618082046509], [75.135438919067, 73.618082046509], [75.135438919067, 73.354864120483], [76.935106277466, 73.354864120483], [76.935106277466, 73.618082046509],
                ],
            ],
            [
                [
                    [77.880975723267, 79.706392288208], [75.776159286499, 79.706392288208], [75.776159286499, 79.431890487671], [77.880975723267, 79.431890487671], [77.880975723267, 79.706392288208],
                ],
            ],
        ];
    }
}
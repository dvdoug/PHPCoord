<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 28.5°E to 31.5°E onshore.
 * @internal
 */
class Extent2750
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [31.5, 62.834386069323], [28.5, 62.834386069323], [28.5, 54.162250230269], [31.5, 54.162250230269], [31.5, 62.834386069323],
                ],
            ],
            [
                [
                    [31.5, 69.841165542603], [28.5, 69.841165542603], [28.5, 62.995048020079], [31.5, 62.995048020079], [31.5, 69.841165542603],
                ],
            ],
            [
                [
                    [31.5, 53.212181199692], [31.266664505005, 53.212181199692], [31.266664505005, 52.858885811094], [31.5, 52.858885811094], [31.5, 53.212181199692],
                ],
            ],
        ];
    }
}

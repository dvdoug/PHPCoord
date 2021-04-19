<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Turkey - 28.5°E to 31.5°E onshore.
 * @internal
 */
class Extent1525
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [31.5, 41.459364531691], [28.5, 41.459364531691], [28.5, 36.068452169032], [31.5, 36.068452169032], [31.5, 41.459364531691],
                ],
            ],
        ];
    }
}

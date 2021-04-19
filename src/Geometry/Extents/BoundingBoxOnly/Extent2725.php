<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 115.5°E to 118.5°E onshore.
 * @internal
 */
class Extent2725
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [118.5, 46.736381530762], [115.5, 46.736381530762], [115.5, 22.60867686901], [118.5, 22.60867686901], [118.5, 46.736381530762],
                ],
            ],
            [
                [
                    [118.5, 49.875992024762], [115.54907226563, 49.875992024762], [115.54907226563, 47.657409667969], [118.5, 47.657409667969], [118.5, 49.875992024762],
                ],
            ],
        ];
    }
}

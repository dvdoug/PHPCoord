<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 130.5°E to 133.5°E.
 * @internal
 */
class Extent2730
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [130.61871337891, 42.684656270846], [130.5, 42.684656270846], [130.5, 42.421859741211], [130.61871337891, 42.421859741211], [130.61871337891, 42.684656270846],
                ],
            ],
            [
                [
                    [133.5, 48.875408172608], [130.5, 48.875408172608], [130.5, 42.775847290039], [133.5, 42.775847290039], [133.5, 48.875408172608],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 78°E to 84°E.
 * @internal
 */
class Extent1588
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [84, 47.224712371826], [77.989959716797, 47.224712371826], [77.989959716797, 29.163330078125], [84, 29.163330078125], [84, 47.224712371826],
                ],
            ],
        ];
    }
}

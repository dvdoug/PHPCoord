<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/India - onshore 78°E to 84°E.
 * @internal
 */
class Extent1681
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [84, 35.307872681212], [78, 35.307872681212], [78, 8.2924142533432], [84, 8.2924142533432], [84, 35.307872681212],
                ],
            ],
            [
                [
                    [78.110801696778, 35.492198944092], [78, 35.492198944092], [78, 35.396855878031], [78.110801696778, 35.396855878031], [78.110801696778, 35.492198944092],
                ],
            ],
        ];
    }
}

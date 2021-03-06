<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 97.5°E to 100.5°E onshore.
 * @internal
 */
class Extent2679
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [100.5, 80.219740992501], [97.5, 80.219740992501], [97.5, 78.726308822632], [100.5, 78.726308822632], [100.5, 80.219740992501],
                ],
            ],
            [
                [
                    [100.5, 78.840091746272], [99.110986709595, 78.840091746272], [99.110986709595, 77.889902114868], [100.5, 77.889902114868], [100.5, 78.840091746272],
                ],
            ],
            [
                [
                    [100.5, 76.569181442261], [97.5, 76.569181442261], [97.5, 49.795844583419], [100.5, 49.795844583419], [100.5, 76.569181442261],
                ],
            ],
            [
                [
                    [98.13730430603, 76.894208908081], [97.5, 76.894208908081], [97.5, 76.531049728394], [98.13730430603, 76.531049728394], [98.13730430603, 76.894208908081],
                ],
            ],
            [
                [
                    [97.70318031311, 80.379809892887], [97.5, 80.379809892887], [97.5, 80.233708205537], [97.70318031311, 80.233708205537], [97.70318031311, 80.379809892887],
                ],
            ],
            [
                [
                    [98.259550094605, 80.897032912457], [97.5, 80.897032912457], [97.5, 80.615813892498], [98.259550094605, 80.615813892498], [98.259550094605, 80.897032912457],
                ],
            ],
        ];
    }
}

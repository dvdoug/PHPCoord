<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Germany - East Germany - east of 13.5°E onshore.
 * @internal
 */
class Extent4003
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [15.033818244934, 54.636044133262], [13.5, 54.636044133262], [13.5, 50.628385267947], [15.033818244934, 50.628385267947], [15.033818244934, 54.636044133262],
                ],
            ],
            [
                [
                    [13.527671405692, 54.711466970006], [13.5, 54.711466970006], [13.5, 54.633563686355], [13.527671405692, 54.633563686355], [13.527671405692, 54.711466970006],
                ],
            ],
        ];
    }
}

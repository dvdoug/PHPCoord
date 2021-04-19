<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 175.5°E to 178.5°E onshore.
 * @internal
 */
class Extent2705
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [178.5, 71.097945296262], [178.46650123596, 71.097945296262], [178.46650123596, 70.97958033206], [178.5, 70.97958033206], [178.5, 71.097945296262],
                ],
            ],
            [
                [
                    [178.5, 69.950304031372], [175.5, 69.950304031372], [175.5, 62.093038266839], [178.5, 62.093038266839], [178.5, 69.950304031372],
                ],
            ],
        ];
    }
}

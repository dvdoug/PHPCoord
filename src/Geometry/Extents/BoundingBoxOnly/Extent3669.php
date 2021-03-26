<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 25ºE to 26ºE.
 * @internal
 */
class Extent3669
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [26, 71.204394181342], [25, 71.204394181342], [25, 68.599476260838], [26, 68.599476260838], [26, 71.204394181342],
                ],
            ],
            [
                [
                    [25.001411068386, 71.099196931832], [25, 71.099196931832], [25, 71.083737749599], [25.001411068386, 71.083737749599], [25.001411068386, 71.099196931832],
                ],
            ],
        ];
    }
}

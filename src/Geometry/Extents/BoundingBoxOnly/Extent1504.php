<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/New Zealand - offshore 174°E to 180°E.
 * @internal
 */
class Extent1504
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [180, -26.421326723261], [174, -26.421326723261], [174, -54.317533760971], [180, -54.317533760971], [180, -26.421326723261],
                ],
            ],
            [
                [
                    [174.78926277161, -36.391570425183], [174, -36.391570425183], [174, -39.022023276961], [174.78926277161, -39.022023276961], [174.78926277161, -36.391570425183],
                ],
            ],
        ];
    }
}

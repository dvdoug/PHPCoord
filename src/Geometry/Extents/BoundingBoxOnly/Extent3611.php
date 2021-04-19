<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Africa/Congo DR (Zaire) - Katanga 26.5°E to 29.5°E.
 * @internal
 */
class Extent3611
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [29.5, -4.9990000724791], [26.5, -4.9990000724791], [26.5, -13.433819770813], [29.5, -13.433819770813], [29.5, -4.9990000724791],
                ],
            ],
            [
                [
                    [29.5, -12.232928398789], [29.446941375733, -12.232928398789], [29.446941375733, -12.394189559327], [29.5, -12.394189559327], [29.5, -12.232928398789],
                ],
            ],
        ];
    }
}

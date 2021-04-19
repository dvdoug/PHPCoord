<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - 120°W to 114°W.
 * @internal
 */
class Extent3528
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-114, 83.491072941219], [-120, 83.491072941219], [-120, 48.999435424805], [-114, 48.999435424805], [-114, 83.491072941219],
                ],
            ],
        ];
    }
}

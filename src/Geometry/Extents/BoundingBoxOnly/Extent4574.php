<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Brazil - west of 54°W and 18°S to 27°30'S.
 * @internal
 */
class Extent4574
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-54, -27.189140319824], [-54.5516406063, -27.189140319824], [-54.5516406063, -27.499952627735], [-54, -27.499952627735], [-54, -27.189140319824],
                ],
            ],
            [
                [
                    [-54, -18], [-58.158889770508, -18], [-58.158889770508, -25.633056640625], [-54, -25.633056640625], [-54, -18],
                ],
            ],
        ];
    }
}

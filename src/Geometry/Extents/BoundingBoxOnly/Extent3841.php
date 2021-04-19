<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 60°W to 54°W, N hemisphere and SAD69 by country.
 * @internal
 */
class Extent3841
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-54, 8.596643447876], [-60, 8.596643447876], [-60, 1.1868762969971], [-54, 1.1868762969971], [-54, 8.596643447876],
                ],
            ],
        ];
    }
}

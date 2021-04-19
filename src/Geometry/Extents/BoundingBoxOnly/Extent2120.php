<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Guatemala - north of 15°51'30"N.
 * @internal
 */
class Extent2120
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-88.347171802692, 15.99101361423], [-88.627066419755, 15.99101361423], [-88.627066419755, 15.858333], [-88.347171802692, 15.858333], [-88.347171802692, 15.99101361423],
                ],
            ],
            [
                [
                    [-88.695717761976, 17.821109771599], [-91.858576447367, 17.821109771599], [-91.858576447367, 15.858333], [-88.695717761976, 15.858333], [-88.695717761976, 17.821109771599],
                ],
            ],
        ];
    }
}

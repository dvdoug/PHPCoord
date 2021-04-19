<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - west - 75°N to 78°N.
 * @internal
 */
class Extent2564
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-44, 78], [-72.574663258244, 78], [-72.574663258244, 75], [-44, 75], [-44, 78],
                ],
            ],
            [
                [
                    [-69.840584568581, 77.515549044684], [-72.788950552864, 77.515549044684], [-72.788950552864, 77.254883421082], [-69.840584568581, 77.254883421082], [-69.840584568581, 77.515549044684],
                ],
            ],
        ];
    }
}

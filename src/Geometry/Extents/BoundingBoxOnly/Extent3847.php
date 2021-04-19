<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Nicaragua - onshore south of 12°48'N.
 * @internal
 */
class Extent3847
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-83.429335345497, 12.8], [-87.625237931971, 12.8], [-87.625237931971, 10.709687232979], [-83.429335345497, 10.709687232979], [-83.429335345497, 12.8],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - Virginia - SPCS - S.
 * @internal
 */
class Extent2261
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-75.315249410657, 38.016833861613], [-76.079090118408, 38.016833861613], [-76.079090118408, 37.10265159607], [-75.315249410657, 37.10265159607], [-75.315249410657, 38.016833861613],
                ],
            ],
            [
                [
                    [-75.790459116743, 38.274192644649], [-83.675176777942, 38.274192644649], [-83.675176777942, 36.541623473923], [-75.790459116743, 36.541623473923], [-75.790459116743, 38.274192644649],
                ],
            ],
        ];
    }
}
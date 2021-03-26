<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/France - mainland north of 49°N.
 * @internal
 */
class Extent3553
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [8.0740880589845, 51.135801649689], [-2.0218508938358, 51.135801649689], [-2.0218508938358, 49], [8.0740880589845, 49], [8.0740880589845, 51.135801649689],
                ],
            ],
        ];
    }
}

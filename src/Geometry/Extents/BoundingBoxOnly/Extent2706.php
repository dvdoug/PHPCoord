<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 178.5°E to 178.5°W onshore.
 * @internal
 */
class Extent2706
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [179.71172904968, 64.253424144341], [178.5, 64.253424144341], [178.5, 62.243280410767], [179.71172904968, 62.243280410767], [179.71172904968, 64.253424144341],
                ],
            ],
            [
                [
                    [181.5, 69.511601532497], [178.5, 69.511601532497], [178.5, 64.542001724243], [181.5, 64.542001724243], [181.5, 69.511601532497],
                ],
            ],
            [
                [
                    [181.5, 71.643449783325], [178.5, 71.643449783325], [178.5, 70.750387191773], [181.5, 70.750387191773], [181.5, 71.643449783325],
                ],
            ],
        ];
    }
}
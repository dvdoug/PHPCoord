<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Indonesia - east of 138°E, S hemisphere.
 * @internal
 */
class Extent1663
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [141.457682632, 0], [138, 0], [138, -10.831851894], [141.457682632, -10.831851894], [141.457682632, 0],
                ],
            ],
        ];
    }
}

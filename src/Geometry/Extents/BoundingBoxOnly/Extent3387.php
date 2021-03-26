<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Iraq - west of 42°E.
 * @internal
 */
class Extent3387
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [42, 36.740386119502], [38.794700622559, 36.740386119502], [38.794700622559, 31.146143140343], [42, 31.146143140343], [42, 36.740386119502],
                ],
            ],
        ];
    }
}

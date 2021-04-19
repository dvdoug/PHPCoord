<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 34°N to 34°40'N; 138°E to 139°E.
 * @internal
 */
class Extent2507
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [138.27456978577, 34.666066666667], [138, 34.666066666667], [138, 34.548181022235], [138.27456978577, 34.548181022235], [138.27456978577, 34.666066666667],
                ],
            ],
            [
                [
                    [139, 34.666066666667], [138.68857477372, 34.666066666667], [138.68857477372, 34.543894602319], [139, 34.543894602319], [139, 34.666066666667],
                ],
            ],
        ];
    }
}

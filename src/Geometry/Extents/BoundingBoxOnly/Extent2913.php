<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 108°E to 114°E, 20°S to 24°S (SF49) onshore.
 * @internal
 */
class Extent2913
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [114, -21.800725790365], [113.39317612958, -21.800725790365], [113.39317612958, -24], [114, -24], [114, -21.800725790365],
                ],
            ],
        ];
    }
}

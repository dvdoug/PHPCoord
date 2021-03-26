<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 138°E to 144°E, 20°S to 24°S (SF54).
 * @internal
 */
class Extent2918
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [144, -20], [138, -20], [138, -24], [144, -24], [144, -20],
                ],
            ],
        ];
    }
}

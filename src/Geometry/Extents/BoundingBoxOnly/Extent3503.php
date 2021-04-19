<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 90°W to 84°W.
 * @internal
 */
class Extent3503
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-84, 48.312210083008], [-90, 48.312210083008], [-90, 23.976667295249], [-84, 23.976667295249], [-84, 48.312210083008],
                ],
            ],
        ];
    }
}

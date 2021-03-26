<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Brazil - 48°W to 42°W and Aratu.
 * @internal
 */
class Extent1573
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-42, -22.668334960937], [-48.003261566162, -22.668334960937], [-48.003261566162, -33.494352340698], [-42, -33.494352340698], [-42, -22.668334960937],
                ],
            ],
            [
                [
                    [-41.999990463257, 0], [-44.786392211914, 0], [-44.786392211914, -3.2975006103515], [-41.999990463257, -3.2975006103515], [-41.999990463257, 0],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/New Zealand - offshore 168°E to 174°E.
 * @internal
 */
class Extent1503
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [174, -42.210137852179], [168, -42.210137852179], [168, -55.949294936], [174, -55.949294936], [174, -42.210137852179],
                ],
            ],
            [
                [
                    [174, -30.789648913], [168, -30.789648913], [168, -44.31108870606], [174, -44.31108870606], [174, -30.789648913],
                ],
            ],
        ];
    }
}

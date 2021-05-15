<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/New Zealand - offshore 180°W to 174°W.
 * @internal
 */
class Extent3992
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-174, -25.888153472455], [-180, -25.888153472455], [-180, -52.960142179711], [-174, -52.960142179711], [-174, -25.888153472455],
                ],
            ],
        ];
    }
}

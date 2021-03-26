<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Colombia - 78°35'W to 75°35'W.
 * @internal
 */
class Extent3090
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-75.583000183105, 10.200925827026], [-78.583332061768, 10.200925827026], [-78.583332061768, 0.032526016235352], [-75.583000183105, 0.032526016235352], [-75.583000183105, 10.200925827026],
                ],
            ],
        ];
    }
}

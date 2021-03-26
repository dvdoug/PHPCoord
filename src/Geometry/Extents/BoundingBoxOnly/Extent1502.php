<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/New Zealand - offshore 162°E to168°E.
 * @internal
 */
class Extent1502
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [168, -39.684142274956], [162, -39.684142274956], [162, -55.883288763876], [168, -55.883288763876], [168, -39.684142274956],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 144°E to 150°E.
 * @internal
 */
class Extent1563
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [150, -9.2321791032173], [144, -9.2321791032173], [144, -50.887457602687], [150, -50.887457602687], [150, -9.2321791032173],
                ],
            ],
        ];
    }
}

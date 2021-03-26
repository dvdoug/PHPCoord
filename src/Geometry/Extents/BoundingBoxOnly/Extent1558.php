<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 114°E to 120°E (EEZ).
 * @internal
 */
class Extent1558
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [120, -12.61408886372], [114, -12.61408886372], [114, -38.52945692], [120, -38.52945692], [120, -12.61408886372],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 150°E to 156°E.
 * @internal
 */
class Extent1564
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [156, -13.876721534028], [150, -13.876721534028], [150, -50.88754719], [156, -50.88754719], [156, -13.876721534028],
                ],
            ],
            [
                [
                    [156, -51.561040204395], [152.86255344, -51.561040204395], [152.86255344, -58.95211682075], [156, -58.95211682075], [156, -51.561040204395],
                ],
            ],
        ];
    }
}

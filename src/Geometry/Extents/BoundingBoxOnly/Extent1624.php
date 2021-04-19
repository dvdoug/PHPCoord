<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Germany - West Germany - west of 7.5°E.
 * @internal
 */
class Extent1624
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [7.5, 53.804147348275], [5.8649992942812, 53.804147348275], [5.8649992942812, 49.111663818359], [7.5, 49.111663818359], [7.5, 53.804147348275],
                ],
            ],
        ];
    }
}

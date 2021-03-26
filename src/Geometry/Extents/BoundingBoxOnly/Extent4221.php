<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Chile - onshore 36°S to 43.5°S.
 * @internal
 */
class Extent4221
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-70.396118164062, -36], [-74.473331451416, -36], [-74.473331451416, -43.5], [-70.396118164062, -43.5], [-70.396118164062, -36],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 120°E to 126°E.
 * @internal
 */
class Extent3959
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [126, 29.709731230101], [122.382001614, 29.709731230101], [122.382001614, 21.109201135], [126, 21.109201135], [126, 29.709731230101],
                ],
            ],
        ];
    }
}

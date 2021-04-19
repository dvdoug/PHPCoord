<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - Qld 144°E to 150°E.
 * @internal
 */
class Extent3690
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [150, -14.016520974253], [144, -14.016520974253], [144, -29.000619], [150, -29.000619], [150, -14.016520974253],
                ],
            ],
            [
                [
                    [146.74396202797, -18.496639180762], [146.44876893267, -18.496639180762], [146.44876893267, -18.814216586602], [146.74396202797, -18.814216586602], [146.74396202797, -18.496639180762],
                ],
            ],
        ];
    }
}

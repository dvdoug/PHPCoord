<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/French Polynesia - 150°W to 144°W.
 * @internal
 */
class Extent3121
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-144, -10.998263894], [-150, -10.998263894], [-150, -31.197560901515], [-144, -31.197560901515], [-144, -10.998263894],
                ],
            ],
            [
                [
                    [-144, -7.2985947091059], [-144.090754634, -7.2985947091059], [-144.090754634, -8.7653215084098], [-144, -8.7653215084098], [-144, -7.2985947091059],
                ],
            ],
        ];
    }
}

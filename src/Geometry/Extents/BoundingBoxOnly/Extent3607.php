<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Finland - east of 30.5°E nominal.
 * @internal
 */
class Extent3607
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [31.58196258545, 63.475742752695], [30.5, 63.475742752695], [30.5, 62.082341233304], [31.58196258545, 62.082341233304], [31.58196258545, 63.475742752695],
                ],
            ],
            [
                [
                    [30.612775802612, 64.265946254012], [30.5, 64.265946254012], [30.5, 63.984214189307], [30.612775802612, 63.984214189307], [30.612775802612, 64.265946254012],
                ],
            ],
        ];
    }
}

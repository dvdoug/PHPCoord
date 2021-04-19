<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 132°E to 138°E, 32°S to 36°S (SI53) onshore.
 * @internal
 */
class Extent2939
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [138, -35.489381983214], [136.47267341614, -35.489381983214], [136.47267341614, -36], [138, -36], [138, -35.489381983214],
                ],
            ],
            [
                [
                    [138, -32], [132.74843788059, -32], [132.74843788059, -35.354125976562], [138, -35.354125976562], [138, -32],
                ],
            ],
            [
                [
                    [132.52683815908, -32], [132.08805681195, -32], [132.08805681195, -32.10312278887], [132.52683815908, -32.10312278887], [132.52683815908, -32],
                ],
            ],
        ];
    }
}

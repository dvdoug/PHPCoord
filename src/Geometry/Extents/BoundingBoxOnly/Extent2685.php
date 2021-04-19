<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 115.5°E to 118.5°E onshore.
 * @internal
 */
class Extent2685
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [118.5, 73.752317640259], [115.5, 73.752317640259], [115.5, 49.518186569214], [118.5, 49.518186569214], [118.5, 73.752317640259],
                ],
            ],
            [
                [
                    [116.30648231506, 74.424222946167], [115.70477104187, 74.424222946167], [115.70477104187, 74.235460281372], [116.30648231506, 74.235460281372], [116.30648231506, 74.424222946167],
                ],
            ],
        ];
    }
}

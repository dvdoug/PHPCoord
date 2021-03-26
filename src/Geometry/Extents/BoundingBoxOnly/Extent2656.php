<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - FSU - 28.5°E to 31.5°E onshore.
 * @internal
 */
class Extent2656
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [31.5, 69.841165542603], [28.5, 69.841165542603], [28.5, 62.995048020079], [31.5, 62.995048020079], [31.5, 69.841165542603],
                ],
            ],
            [
                [
                    [31.5, 62.834386069323], [28.5, 62.834386069323], [28.5, 45.180633146895], [31.5, 45.180633146895], [31.5, 62.834386069323],
                ],
            ],
        ];
    }
}

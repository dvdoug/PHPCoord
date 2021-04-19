<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 18°E to 24°E onshore and S-42(58) by country.
 * @internal
 */
class Extent3577
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [24, 54.88596594036], [18, 54.88596594036], [18, 41.320549011231], [24, 41.320549011231], [24, 54.88596594036],
                ],
            ],
            [
                [
                    [21.053331375122, 42.660343170166], [19.224593543761, 42.660343170166], [19.224593543761, 39.643064023431], [21.053331375122, 39.643064023431], [21.053331375122, 42.660343170166],
                ],
            ],
        ];
    }
}

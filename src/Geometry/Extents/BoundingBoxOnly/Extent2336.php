<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Spain - mainland except northwest.
 * @internal
 */
class Extent2336
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-2.888749511069, 35.376718521067], [-2.9701587589999, 35.376718521067], [-2.9701587589999, 35.265663028], [-2.888749511069, 35.265663028], [-2.888749511069, 35.376718521067],
                ],
            ],
            [
                [
                    [-5.2468490600585, 35.965978622437], [-5.3955574035643, 35.965978622437], [-5.3955574035643, 35.829763412476], [-5.2468490600585, 35.829763412476], [-5.2468490600585, 35.965978622437],
                ],
            ],
            [
                [
                    [2.0150575893808, 42.495050765739], [1.9573331692905, 42.495050765739], [1.9573331692905, 42.447842027764], [2.0150575893808, 42.447842027764], [2.0150575893808, 42.495050765739],
                ],
            ],
            [
                [
                    [3.3852024078371, 43.559949874878], [-7.5325050354004, 43.559949874878], [-7.5325050354004, 35.956438064575], [3.3852024078371, 35.956438064575], [3.3852024078371, 43.559949874878],
                ],
            ],
        ];
    }
}
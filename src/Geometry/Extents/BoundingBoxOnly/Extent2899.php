<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 126°E to 132°E, 8°S to 12°S (SC52) onshore.
 * @internal
 */
class Extent2899
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [131.19436070601, -11.986395078352], [131.02637955825, -11.986395078352], [131.02637955825, -12], [131.19436070601, -12], [131.19436070601, -11.986395078352],
                ],
            ],
            [
                [
                    [132, -11.077192306518], [131.71382713318, -11.077192306518], [131.71382713318, -11.532642155363], [132, -11.532642155363], [132, -11.077192306518],
                ],
            ],
        ];
    }
}

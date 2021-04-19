<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 85.5°E to 88.5°E onshore.
 * @internal
 */
class Extent2769
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [88.5, 77.158278689632], [88.41241645813, 77.158278689632], [88.41241645813, 77.003889548311], [88.5, 77.003889548311], [88.5, 77.158278689632],
                ],
            ],
            [
                [
                    [88.5, 75.378029377866], [85.5, 75.378029377866], [85.5, 49.077493667603], [88.5, 49.077493667603], [88.5, 75.378029377866],
                ],
            ],
        ];
    }
}

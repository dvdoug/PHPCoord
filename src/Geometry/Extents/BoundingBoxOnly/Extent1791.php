<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - east of 174°W onshore.
 * @internal
 */
class Extent1791
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-168.97671697238, 65.854173587782], [-169.21289543768, 65.854173587782], [-169.21289543768, 65.706914653831], [-168.97671697238, 65.706914653831], [-168.97671697238, 65.854173587782],
                ],
            ],
            [
                [
                    [-169.571173, 67.177885], [-174, 67.177885], [-174, 64.208624], [-169.571173, 64.208624], [-169.571173, 67.177885],
                ],
            ],
        ];
    }
}

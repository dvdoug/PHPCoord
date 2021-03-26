<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Kuwait - east of 48°E onshore.
 * @internal
 */
class Extent1740
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [48.470911889888, 29.437504092556], [48, 29.437504092556], [48, 28.541562002219], [48.470911889888, 28.541562002219], [48.470911889888, 29.437504092556],
                ],
            ],
            [
                [
                    [48.416745457509, 30.030153144001], [48, 30.030153144001], [48, 29.500208881359], [48.416745457509, 29.500208881359], [48.416745457509, 30.030153144001],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Asia - Middle East - Kuwait and Saudi - 48°E to 54°E.
 * @internal
 */
class Extent1570
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [54, 29.437504092556], [47.999091699022, 29.437504092556], [47.999091699022, 17.948491379704], [54, 17.948491379704], [54, 29.437504092556],
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

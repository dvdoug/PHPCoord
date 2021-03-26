<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Asia - Middle East - Kuwait and Saudi - 42°E to 48°E.
 * @internal
 */
class Extent1571
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [42.230400839993, 16.943864198044], [42, 16.943864198044], [42, 16.514366208706], [42.230400839993, 16.514366208706], [42.230400839993, 16.943864198044],
                ],
            ],
            [
                [
                    [48, 31.146143140343], [42, 31.146143140343], [42, 16.377502441406], [48, 16.377502441406], [48, 31.146143140343],
                ],
            ],
        ];
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Maritime Provinces - east of 66°W.
 * @internal
 */
class Extent1532
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-59.7372811359, 47.978231157224], [-66, 47.978231157224], [-66, 43.415647861102], [-59.7372811359, 43.415647861102], [-59.7372811359, 47.978231157224],
                ],
            ],
            [
                [
                    [-61.902259795466, 47.08724966936], [-64.488328900612, 47.08724966936], [-64.488328900612, 45.905612713677], [-61.902259795466, 45.905612713677], [-61.902259795466, 47.08724966936],
                ],
            ],
        ];
    }
}
